<?php

namespace App\Http\Controllers\API;

use App\Branch;
use App\BranchOffer;
use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use App\Order;
use App\OrderRating;
use App\Product;
use App\ProductBranch;
use App\Restorant;
use App\RestorantRating;
use App\Setting;
use App\User;
use DateTime;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\json_decode;

class OrdersController extends Controller
{

    private function checkYouCanOrder($productArr, $branchId)
    {
        $branch = Branch::find($branchId);
        $restorant = Restorant::find($branch->restorant_id);
        if ($restorant->accepted == true) {
            $nowDay = date('N');
            $openDayesArray =  json_decode($branch->open_dayes);
            if (in_array($nowDay, $openDayesArray) && (date('H:i') <= date('H:i', strtotime($branch->open_to))   && date('H:i') >= date('H:i', strtotime($branch->open_from))) &&  $branch->busy == 0) {
                foreach ($productArr as $key => $product) {
                    $productCheck = Product::where('id', $product['product_id'])->exists();

                    if ($productCheck == true) {
                        if (isset($product['product_offer'])) {
                            $offerCheck = BranchOffer::where(['branch_id' => $branchId, 'product_id' => $product['product_id']])->exists();
                            if ($offerCheck == true) {
                                $offerCheckData = BranchOffer::where(['branch_id' => $branchId, 'product_id' => $product['product_id']])->first();
                                if ($offerCheckData->active == true && date('Y-m-d H:i') <= date('Y-m-d H:i', strtotime($offerCheckData->offer_end_date))) {
                                    $data['success'] = true;
                                } else {
                                    $data['success'] = false;
                                    $data['message'] = 'العرض ' . $product['name'] . ' غير متاح حاليا لأكمال الطلب يجب الحذف من السلة';
                                    return $data;
                                }
                            } else {
                                $data['success'] = false;
                                $data['message'] = 'العرض ' . $product['name'] . ' غير متاح حاليا لأكمال الطلب يجب الحذف من السلة';
                                return $data;
                            }
                        } else {
                            $productCheck = ProductBranch::where(['branch_id' => $branchId, 'product_id' => $product['product_id']])->first();
                            if ($productCheck->available == true) {
                                $data['success'] = true;
                            } else {
                                $data['success'] = false;
                                $data['message'] = 'المنتج ' . $product['name'] . ' غير متاح حاليا لأكمال الطلب يجب الحذف من السلة';
                                return $data;
                            }
                        }
                    } else {
                        $data['success'] = false;
                        $data['message'] = 'المنتج ' . $product['name'] . ' أصبح غير متاح لأكمال الطلب يجب الحذف من السلة';
                        return $data;
                    }
                }
            } else {
                $data['success'] = false;
                $data['message'] = 'هذا الفرع غير متاح حاليا..';
                return $data;
            }
        } else {
            $data['success'] = false;
            $data['message'] = 'المطعم أصبح غير متاح..';
            return $data;
        }

        return $data;
    }
    public function makeOrder(Request $request)
    {
        $checkResponse = $this->checkYouCanOrder($request->products, $request->branch_id);
        if ($checkResponse['success'] == true) {
            $user = Auth::user();
            $nowDate = date('Y-m-d H:i');
            $arivalTime = explode('-', $request->arrival_time);
            $arivalTime = round(((int)$arivalTime[0] + (int)$arivalTime[1]) / 2);
            $nowTime = date('H:i', strtotime("+" . $arivalTime . " minutes"));
            $orderArr['user_id'] = $user->id;
            $orderArr['branch_id'] = $request->branch_id;
            $orderArr['serial_num'] = date('YmdHi');
            $orderArr['arrival_time'] = $nowTime;
            $orderArr['ready_time'] = $nowTime;
            $orderArr['discount'] = $request->discount;
            if ($request->copon_id != 0) {
                $orderArr['copon_id'] = $request->copon_id;
                $user = User::find($user->id);
                $user->cobons()->attach($request->copon_id);
            }
            if (isset($request->order_vat) && $request->order_vat > 0) {
                $orderArr['order_vat'] = $request->order_vat;
            }
            if (isset($request->app_vat) && $request->app_vat > 0) {
                $orderArr['app_vat'] = $request->app_vat;
            }
            $orderArr['total_price'] = $request->total_price;
            $orderArr['tax_price'] = $request->tax_price;
            $orderArr['pay_type'] = $request->pay_type;
            $orderArr['order_date'] = $nowDate;
            $orderArr['local'] = $request->local;
            if ($orderArr['local'] == false) {
                $orderArr['travel_type'] = $request->travel_type;
                $orderArr['car_type'] = $request->car_type;
                $orderArr['car_color'] = $request->car_color;
                $orderArr['car_palet'] = $request->car_palet;
            } elseif ($orderArr['local'] == true) {
                $orderArr['families_Individuals'] = $request->families_Individuals;
                $orderArr['Individuals_num'] = $request->Individuals_num;
            }
            $order = Order::create($orderArr);
            $productsArr = [];
            foreach ($request->products as $key => $product) {
                $productsArr[$key]['product_id'] = $product['product_id'];
                if (isset($product['product_offer'])) {
                    $productsArr[$key]['product_offer'] = $product['product_offer'];
                }
                if (isset($product['offer_discount'])) {
                    $productsArr[$key]['offer_discount'] = $product['offer_discount'];
                }
                $productsArr[$key]['quantity'] = $product['quantity'];
                $productsArr[$key]['price'] = $product['price'];
                $productsArr[$key]['custom_requires'] = $product['custom_requires'];
                $optionsArr = [];
                if (sizeof($product['group_options']) > 0) {
                    foreach ($product['group_options'] as $key2 => $group) {
                        $optionsArr[$key2]['id'] = $group['id'];
                        $optionsArr[$key2]['name'] = $group['name'];
                        $optionsArr[$key2]['product_group_option'] = array_values($group['product_group_option']);
                    }
                }

                $productsArr[$key]['serialized_optios'] = json_encode($optionsArr);
            }
            $order->orderProduct()->createMany($productsArr);
            $data['success'] = true;
            $data['order_id'] = $order->id;
            return response()->json($data, 200);
        } else {
            return response()->json($checkResponse);
        }
    }

    public function getOrderStatus($id)
    {
        $orderStatus = Order::select('id', 'status', 'is_rated')->find($id);
        switch ($orderStatus->status) {
            case 'preparing':
                $message = 'لقد تم قبول طلبك وجاري التحضير ..';
                $status = 'preparing';
                $is_rated = $orderStatus->is_rated;
                break;
            case 'prepared':
                $message = 'تم تحضير طلبك بنجاح ..';
                $status = 'preparing';
                $is_rated = $orderStatus->is_rated;
                break;
            case 'submited':
                $message  = 'لقد تم وضع طلبك وفي انتظار قبول المطعم ..';
                $status = 'submited';
                $is_rated = $orderStatus->is_rated;
                break;
            case 'rejected':
                $message  = 'لقد تم رفض طلبك ..';
                $status = 'rejected';
                $is_rated = $orderStatus->is_rated;
                break;
            case 'canceled':
                $message  = 'لقد قمت بألغاء الطلب ..';
                $status = 'canceled';
                $is_rated = $orderStatus->is_rated;
                break;
            case 'done':
                $message  = 'تم تسليم طلبك بنجاح ...';
                $status = 'done';
                $is_rated = $orderStatus->is_rated;
                break;

            default:
                $message  = 'لايوجد طلب..';
                break;
        }
        $data['success'] = true;
        $data['data']['id'] = $id;
        $data['data']['status'] = $status;
        $data['data']['is_rated'] = $is_rated;
        $data['data']['message'] = $message;
        return response()->json($data);
    }
    public function trackYourOrder($id)
    {
        $order = Order::with([
            'orderProduct' => function ($query) {
                $query->select('id', 'order_id', 'product_id', 'quantity', 'price', 'serialized_optios')->with(['Product' => function ($product) {
                    $product->select('id', 'name', 'photo');
                }]);
            },
            'branch' => function ($query) {
                $query->select('id', 'location_lat', 'location_lon', 'name', 'location_name', 'restorant_id')->with([
                    'restorant' => function ($restorant) {
                        $restorant->select('id', 'name');
                    }
                ]);
            },
            'orderRating' => function ($rate) {
                $rate->select('id', 'order_id', 'rate');
            }
        ])->select('id', 'serial_num', 'branch_id', 'total_price', 'tax_price', 'order_vat', 'app_vat', 'discount', 'pay_type', 'status', 'local', 'order_date', 'ready_time', 'is_rated', 'order_date')->find($id);
        $nowTime = date('Y-m-d H:i');
        $orderDate = date('Y-m-d H:i', strtotime($order->order_date . '+5 minutes'));
        if (date('H:i', strtotime($order->ready_time)) > date('H:i')) {
            $start_date = new DateTime(date('H:i', strtotime($order->ready_time)));
            $readyIn = $start_date->diff(new DateTime(date('H:i:s')));
            $readyInNew = $readyIn->h . ':' . $readyIn->i  . ':' . $readyIn->s;
            $readyInNew_web = ($readyIn->h * 60) + $readyIn->i;
            $readyInNew_george_kiroles = ($readyIn->h * 60 * 60) + ($readyIn->i * 60) + $readyIn->s;
            $timer = $readyInNew;
            $timer_web = $readyInNew_web;
            $timer_george_kiroles = $readyInNew_george_kiroles;
        } else {
            $timer = 0;
            $timer_web = 0;
            $timer_george_kiroles = 0;
        }

        if ($orderDate > $nowTime && $order->status == 'submited') {
            $cancel = true;
        } else {
            $cancel = false;
        }
        $returnOrderObject['id'] = $order->id;
        $returnOrderObject['cancel'] = $cancel;
        $returnOrderObject['timer'] = $timer;
        $returnOrderObject['timer_web'] = $timer_web;
        $returnOrderObject['timer_george_kiroles'] = $timer_george_kiroles;
        $returnOrderObject['serial_num'] = $order->serial_num;
        $returnOrderObject['total_price'] = $order->total_price;
        $returnOrderObject['tax_price'] = $order->tax_price;
        $returnOrderObject['order_vat'] = $order->order_vat;
        $returnOrderObject['app_vat'] = $order->app_vat;
        $returnOrderObject['discount'] = $order->discount;
        $returnOrderObject['order_date'] = $order->order_date;
        $returnOrderObject['pay_type'] = $order->pay_type;
        $returnOrderObject['status'] = $order->status;
        $returnOrderObject['local'] = $order->local;
        $returnOrderObject['is_rated'] = $order->is_rated;
        $returnOrderObject['restorant_name'] = $order->branch->restorant->name;
        $returnOrderObject['restorant_id'] = $order->branch->restorant->id;
        $returnOrderObject['branch_name'] = $order->branch->name;
        $returnOrderObject['branch_lat'] = $order->branch->location_lat;
        $returnOrderObject['branch_lon'] = $order->branch->location_lon;
        $returnOrderObject['location_name'] = $order->branch->name;
        if (sizeof($order->orderRating) > 0) {
            $returnOrderObject['orderRating'] = $order->orderRating[0]->rate;
        } else {
            $returnOrderObject['orderRating'] = null;
        }
        foreach ($order->orderProduct as $key => $value) {
            $returnOrderObject['order_products'][$key]['id'] = $value->id;
            $returnOrderObject['order_products'][$key]['name'] = $value->Product->name;
            $returnOrderObject['order_products'][$key]['photo'] = $value->Product->photo;
            $returnOrderObject['order_products'][$key]['price'] = $value->price;
            $returnOrderObject['order_products'][$key]['quantity'] = $value->quantity;
            $returnOrderObject['order_products'][$key]['optios'] = json_decode($value->serialized_optios);
        }
        unset($order);
        $data['success'] = true;
        $data['order'] = $returnOrderObject;
        return response()->json($data);
    }

    public function previousOrders()
    {
        $orders = Order::where('user_id', Auth::user()->id)->whereIn('status', ['done', 'canceled', 'rejected'])->with([
            'orderProduct' => function ($query) {
                $query->select('id', 'order_id', 'product_id', 'quantity', 'price', 'offer_discount', 'serialized_optios', 'custom_requires')->with(['Product' => function ($product) {
                    $product->select('id', 'name', 'ready_in', 'ready_to', 'photo');
                }]);
            },
            'branch' => function ($query) {
                $query->select('id', 'name', 'location_name', 'location_lat', 'location_lon', 'restorant_id')->with([
                    'restorant' => function ($restorant) {
                        $restorant->select('id', 'name', 'photo');
                    }
                ]);
            },
            'orderRating' => function ($rate) {
                $rate->select('id', 'order_id', 'rate');
            }
        ])->select('id', 'local', 'serial_num', 'total_price', 'branch_id', 'order_date', 'status', 'pay_type', 'tax_price', 'order_vat', 'app_vat', 'discount', 'is_rated')->orderByRaw('created_at DESC')->paginate(20);

        foreach ($orders as $key => $order) {
            $orders[$key]['restorant_id'] = $order->branch->restorant->id;
            $orders[$key]['restorant_name'] = $order->branch->restorant->name;
            $orders[$key]['restorant_photo'] = $order->branch->restorant->photo;
            $orders[$key]['branch_name'] = $order->branch->name;
            $orders[$key]['location_lat'] = $order->branch->location_lat;
            $orders[$key]['location_lon'] = $order->branch->location_lon;
            $orders[$key]['location_name'] = $order->branch->location_name;
            if (sizeof($order->orderRating) > 0) {
                $orders[$key]['order_rating'] = $order->orderRating[0]->rate;
            } else {
                $orders[$key]['order_rating'] = null;
            }
            foreach ($order->orderProduct as $key2 => $value) {
                // return $value;
                $order_products[$key2]['id'] = $value->Product->id;
                $order_products[$key2]['name'] = $value->Product->name;
                $order_products[$key2]['photo'] = $value->Product->photo;
                $order_products[$key2]['ready_in'] = $value->Product->ready_in;
                $order_products[$key2]['ready_to'] = $value->Product->ready_to;
                $order_products[$key2]['price'] = $value->price;
                $order_products[$key2]['offer_discount'] = $value->offer_discount;
                $order_products[$key2]['quantity'] = $value->quantity;
                $order_products[$key2]['custom_requires'] = $value->custom_requires;
                $order_products[$key2]['group_options'] = json_decode($value->serialized_optios);
            }
            $orders[$key]['products'] = $order_products;
            unset($orders[$key]->branch, $orders[$key]->orderRating, $orders[$key]->orderProduct);
        }
        $data['success'] = true;
        $data['data'] = $orders;
        return response()->json($data);
    }

    public function last3SuccessOrders()
    {
        $orders = Order::where('user_id', Auth::user()->id)->whereIn('status', ['done'])->with([
            'orderProduct' => function ($query) {
                $query->select('id', 'order_id', 'product_id', 'quantity', 'price', 'serialized_optios', 'custom_requires')->with(['Product' => function ($product) {
                    $product->select('id', 'name', 'ready_in', 'ready_to');
                }]);
            },
            'branch' => function ($query) {
                $query->select('id', 'name', 'location_name', 'restorant_id')->with([
                    'restorant' => function ($restorant) {
                        $restorant->select('id', 'name');
                    }
                ]);
            },
            'orderRating' => function ($rate) {
                $rate->select('id', 'order_id', 'rate');
            }
        ])->select('id', 'local', 'serial_num', 'total_price', 'branch_id', 'order_date', 'status', 'pay_type', 'tax_price', 'order_vat', 'app_vat', 'discount', 'is_rated')->orderByRaw('created_at DESC')->take(3)->get();

        foreach ($orders as $key => $order) {
            $orders[$key]['restorant_name'] = $order->branch->restorant->name;
            $orders[$key]['branch_name'] = $order->branch->name;
            $orders[$key]['location_name'] = $order->branch->location_name;
            if (sizeof($order->orderRating) > 0) {
                $orders[$key]['order_rating'] = $order->orderRating[0]->rate;
            } else {
                $orders[$key]['order_rating'] = null;
            }
            foreach ($order->orderProduct as $key2 => $value) {
                // return $value;
                $order_products[$key2]['id'] = $value->id;
                $order_products[$key2]['name'] = $value->Product->name;
                $order_products[$key2]['ready_in'] = $value->Product->ready_in;
                $order_products[$key2]['ready_to'] = $value->Product->ready_to;
                $order_products[$key2]['price'] = $value->price;
                $order_products[$key2]['quantity'] = $value->quantity;
                $order_products[$key2]['custom_requires'] = $value->custom_requires;
                $order_products[$key2]['group_options'] = json_decode($value->serialized_optios);
            }
            $orders[$key]['products'] = $order_products;
            unset($orders[$key]->branch, $orders[$key]->orderRating, $orders[$key]->orderProduct);
        }
        $data['success'] = true;
        $data['data'] = $orders;
        return response()->json($data);
    }

    public function orderRecived($id, $status)
    {
        $input['status'] = $status;
        Notification::where('order_id', $id)->delete();
        if (Order::find($id)->update($input)) {
            $data['success'] = true;
        } else {
            $data['success'] = false;
        }
        return response()->json($data);
    }

    public function rateOrder(Request $request)
    {
        $orderRate['user_id'] = Auth::user()->id;
        $orderRate['order_id'] = $request->order_id;
        $orderRate['rate'] = $request->order_rate;
        $orderRate['review'] = $request->order_review;
        OrderRating::create($orderRate);
        $order = Order::find($request->order_id);
        $order->is_rated = true;
        $order->save();
        $restorantRate['user_id'] = Auth::user()->id;
        $restorantRate['restorant_id'] = $request->restorant_id;
        $restorantRate['rate'] = $request->restorant_rate;
        $restorantRate['review'] = $request->restorant_review;
        RestorantRating::create($restorantRate);
        $data['success'] = true;
        return response()->json($data);
    }

    public function getOlumPercent()
    {
        $olum_percent = Setting::select('olum_price', 'olum_percentage', 'vat_percentage', 'tax_number')->find(1);
        $data['success'] = true;
        $data['data'] = $olum_percent;
        return response()->json($data);
    }
    
    public function rejectHoldingOrders()
    {
        $orders = Order::where('status', 'submited')->get();
        foreach ($orders as $key => $order) {
            if (date('Y-m-d H:i') > date('Y-m-d H:i', strtotime($order->order_date . '+5 minutes'))) {
                $order->status = 'rejected';
                $order->save();
            }
        }
        return response()->json(true);
    }
}

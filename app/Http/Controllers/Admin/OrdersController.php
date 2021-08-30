<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use App\Order;
use App\Restorant;
use App\User;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Agent;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 1;
    }

    public function branchOrders($branch_id, $filter, $search_key)
    {
        $basicConditionsArr[] = ['branch_id', '=', $branch_id];
        if ($filter != 'all') {
            $basicConditionsArr[] = ['status', '=', $filter];
        }
        if ($search_key != 'all') {
            $basicConditionsArr[] = ['serial_num', 'LIKE', "%{$search_key}%"];
        }
        $orders = Order::where($basicConditionsArr)->orderBy('updated_at', 'DESC')->paginate(20);
        // return $orders;
        return view('admin.orders.branch_orders', compact('orders', 'filter', 'search_key', 'branch_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::with([
            'orderRating',
            'orderProduct',
            'user',
            'DiscountCobon'
        ])->find($id);
        // return $order;
        $agent = new Agent();
        if ($agent->isMobile() or $agent->isTablet()) {
            return view('admin.orders.show_mobile', ['order' => $order]);
        }
        return view('admin.orders.show', ['order' => $order]);
    }
    public function print_inv($id)
    {
        $order = Order::with([
            'orderRating',
            'orderProduct',
            'user',
            'DiscountCobon'
        ])->find($id);
        // return $order;
        return view('admin.orders.print_inv', ['order' => $order]);
    }

    public function print_inv_test($id)
    {
        $order = Order::with([
            'orderRating',
            'orderProduct',
            'user',
            'DiscountCobon'
        ])->find($id);
        // return $order;
        return view('admin.orders.print_inv_test', ['order' => $order]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $test_order_status = Order::find($id)->status;
        switch ($test_order_status) {
            case 'rejected':
                session()->flash('notif', __('الطلب مرفوض'));
                return redirect('admin/orders/' . $id);
                break;

            case 'canceled':
                session()->flash('notif', __('الطلب ملغي'));
                return redirect('admin/orders/' . $id);
                break;

            case 'arrival':
                session()->flash('notif', __('تم وصول العميل ويتم الأستلام من خلاله'));
                return redirect('admin/orders/' . $id);
                break;

            case 'done':
                session()->flash('notif', __('تم أستلام الطلب بالفعل'));
                return redirect('admin/orders/' . $id);
                break;

            default:
                $input = $request->all();
                if (Order::find($id)->update($input)) {
                    $user = User::find(Order::find($id)->user_id);
                    if (isset($request->status) && $user->device_token != null) {
                        if (in_array($request->status, ['preparing', 'prepared'])) {
                            $dataArr['reciever_id'] = $user->id;
                            $dataArr['image'] = Restorant::where('id', Branch::where('id', Order::where('id', $id)->first()->branch_id)->first()->restorant_id)->first()->photo;
                            $dataArr['type'] = 'order';
                            $dataArr['order_status'] = $request->status;
                            $dataArr['order_id'] = $id;
                            $dataArr['title'] = Restorant::where('id', Branch::where('id', Order::where('id', $id)->first()->branch_id)->first()->restorant_id)->first()->name;
                            $dataArr['body'] = 'مرحبا ' . $user->name . ' لقد تم وضع طلبك في حالة ' . __('General.' . $request->status) . ' مشاهدة المزيد.';
                            Helper::olumNotification($dataArr, $user->device_token, true);
                        } elseif (in_array($request->status, ['rejected', 'done'])) {
                            $dataArr['reciever_id'] = $user->id;
                            $dataArr['image'] = Restorant::where('id', Branch::where('id', Order::where('id', $id)->first()->branch_id)->first()->restorant_id)->first()->photo;
                            $dataArr['type'] = 'previous';
                            $dataArr['order_status'] = $request->status;
                            $dataArr['order_id'] = $id;
                            $dataArr['title'] = Restorant::where('id', Branch::where('id', Order::where('id', $id)->first()->branch_id)->first()->restorant_id)->first()->name;
                            $dataArr['body'] = 'مرحبا ' . $user->name . ' لقد تم وضع طلبك في حالة ' . __('General.' . $request->status) . ' مشاهدة المزيد.';
                            Helper::olumNotification($dataArr, $user->device_token, false);
                            Notification::where('order_id', $id)->delete();
                        }
                    }
                    session()->flash('notif', __('General.modified_successfully'));
                    return redirect('admin/orders/' . $id);
                } else {
                    session()->flash('notif', __('General.error'));
                }
                break;
        }
    }

    public function getClientsArivals()
    {
        $user_id = Auth::user()->id;
        $branches =  array_column(Branch::where('user_id', $user_id)->select('id')->get()->toArray(), 'id');
        $arrivals = Order::where('status', 'arrival')->whereIn('branch_id', $branches)->select('id', 'serial_num')->get();
        return $arrivals;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    private function getYearMonths()
    {
        return array('', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
    }
    public function getOrdersDaily()
    {
        $year = date('Y');
        $month = date('n');
        $day = date('j');
        $hour = date('G');

        $prev12HoursHour = date('G', strtotime('-12 hours', strtotime(date("Y-m-d H:i:s"))));

        $months = $this->getYearMonths();

        $OrdersData = [];
        $i = 12;

        do {
            if ($hour < 0) {
                $newYear = date('Y', strtotime('-1 day', strtotime($year . '-' . $month . '-' . $day)));
                $newMonth = date('m', strtotime('-1 day', strtotime($year . '-' . $month . '-' . $day)));
                $newDay = date('j', strtotime('-1 day', strtotime($year . '-' . $month . '-' . $day)));

                $year = $newYear;
                $month = $newMonth;
                $day = $newDay;
                $hour = 23;
            }
            $date = $year . '-' . $month . '-' . $day . ' ' . $hour;
            $orders = Order::whereDate('created_at', '=', $date)->count();

            array_unshift($OrdersData, $orders);
            $hour--;
            $i--;
        } while ($i > 0);

        echo json_encode(compact('OrdersData'));
        exit();
    }
    public function getOrdersMonthly()
    {
        $year = date('Y');
        $month = date('n');
        $currentDay = date('j');

        $months = $this->getYearMonths();

        $day = $currentDay;

        $OrdersData = [];
        $i = 31;
        do {
            if ($day < 1) {
                $newYear = date('Y', strtotime('-1 day', strtotime($year . '-' . $month . '-' . $day)));
                $newMonth = date('n', strtotime('-1 day', strtotime($year . '-' . $month . '-' . $day)));

                $year = $newYear;
                $month = $newMonth;
                $day = date('t', strtotime($year . '-' . $month));
            }
            $orders = Order::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->whereDay('created_at', '=', $day)->count();

            $day--;
            array_unshift($OrdersData, $orders);
            $i--;
        } while ($i > 0);
        echo json_encode(compact('OrdersData'));
        exit();
    }

    public function getOrdersWeekly($type)
    {
        $year = date('Y');
        $month = date('n');
        $day = date('j');

        $months = $this->getYearMonths();

        $lastWeekDay = date('j', strtotime("-8 days"));
        $OrdersData = [];
        $i = 7;
        do {
            if ($day < 1) {
                $newYear = date('Y', strtotime('-1 month', strtotime($year . '-' . $month)));
                $newMonth = date('n', strtotime('-1 month', strtotime($year . '-' . $month)));

                $year = $newYear;
                $month = $newMonth;
                $day = date('t', strtotime($year . '-' . $month));
            }
            $date = $year . '-' . $month . '-' . $day;
            $orders = Order::whereDate('created_at', '=', $date)->count();

            array_unshift($OrdersData, $orders);
            $day--;
            $i--;
        } while ($i > 0);

        echo json_encode(compact('OrdersData'));
        exit();
    }

    public function getOrdersYearly()
    {
        $year = date('Y');
        $currentMonth = date('n');
        $months = $this->getYearMonths();
        $month = $currentMonth;
        $OrdersData = [];
        $i = 12;
        do {
            if ($month < 1) {
                $month = 12;
                $year--;
            }
            $date = $year . '-' . $month;
            $orders = Order::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->count();

            array_unshift($OrdersData, $orders);
            $month--;
            $i--;
        } while ($i > 0);

        echo json_encode(compact('OrdersData'));
        exit();
    }
}

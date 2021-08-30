<?php

namespace App\Http\Controllers\API;

use App\Branch;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;
use App\Product;
use App\Restorant;
use App\Type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\json_decode;
use function PHPSTORM_META\type;

class ApplicationHomeController extends Controller
{
    public function getTypes()
    {
        $types  = Type::select('id', 'name', 'photo')->orderBy('updated_at', 'desc')->get();
        return response()->json($types, 200);
    }

    public function sugestedRestorants()
    {
        $sugestedRestorants  = Restorant::where(['accepted' => true,'featured' => true])->select('id', 'name', 'photo', 'featured_meals')->orderByDesc('priority')->get();
        return response()->json($sugestedRestorants, 200);
    }

    public function sugestedProducts()
    {
        $featuredRestorants = Restorant::where(['accepted' => true,'featured' => true])->select('id')->get();
        if (count($featuredRestorants) > 0) {
            foreach ($featuredRestorants as $key => $value) {
                $featuredRestorantsArr[$key] = $value->id;
            }
        } else {
            $featuredRestorantsArr = 0;
        }
        $products = Product::whereIn('restorant_id', $featuredRestorantsArr)->with(array('restorant' => function ($query) {
            $query->select('id', 'name', 'photo', 'featured_meals');
        }))->select('id', 'name', 'description', 'restorant_id', 'ready_in', 'ready_to', 'photo')->inRandomOrder()->limit(4)->get();
        return response()->json($products, 200);
    }

    public function searchForRestorant(Request $request)
    {
        $restorants = Restorant::select('id', 'name', 'photo')->where('name', 'LIKE', '%' . $request->searchValue . '%')->get();
        $restorantscount = Restorant::select('id', 'name', 'photo')->where('name', 'LIKE', '%' . $request->searchValue . '%')->count();
        foreach ($restorants as $key => $value) {
            $restorants[$key]['rate'] = $value->RestorantRating->avg('rate');
            unset($restorants[$key]['RestorantRating']);
        }
        $data['count'] = $restorantscount;
        $data['restorants'] = $restorants;
        return response()->json($data, 200);
    }

    public function restorantsApp(Request $request)
    {
        $category_id = $request->category_id;
        $this->type_id = $request->type_id;
        $this->area_id = $request->area_id;
        $this->lat = $request->lat;
        $this->lon = $request->lon;
        $this->serch_key = $request->serch_key;
        $area_location = $request->area_location;
        $basicConditionsArr[] = ['accepted', '=', true];
        if ($request->category_id != null) {
            // return $request->category_id;
            $basicConditionsArr[] = ['category_id', '=', $category_id];
        }
        if ($request->serch_key != null) {
            $basicConditionsArr[] = ['restorants.name', 'LIKE', "%{$this->serch_key}%"];
        }
        if ($request->type_id != null) {
            $this->typeConditionsArr[] = ['type_restorants.type_id', '=', $this->type_id];
        } else {
            $this->typeConditionsArr[] = ['restorants.accepted', '=', true];
        }
        $this->branchesIds = [];
        $this->areaConditionsArr[] = ['restorants.accepted', '=', true];
        if ($request->area_location != null) {
            if ($area_location == 'area') {
                if ($request->area_id) {
                    $this->areaConditionsArr[] = ['area_restorants.area_id', '=', $this->area_id];
                }
            } elseif ($area_location == 'location') {
                if ($request->lat && $request->lon) {
                    $branchesIds = DB::select("SELECT branches.id,
                    ROUND ((6371 * acos(cos( radians(" . $this->lat . ") ) * cos( radians(branches.location_lat) ) * cos( radians(branches.location_lon) - radians(" . $this->lon . ") ) 
                            + sin( radians(" . $this->lat . ") ) 
                            * sin(radians(branches.location_lat)) 
                            ) 
                            )
                            ,2) 
                        AS distance FROM branches having distance <= 1");

                    $this->branchesIds = array_column($branchesIds, 'id');
                }
            }
        }
        // $restorants = Restorant::where($basicConditionsArr)
        //     ->join('type_restorants', function ($type) {
        //         $type->on('restorants.id', '=', 'type_restorants.restorant_id')
        //             ->where($this->typeConditionsArr);
        //     })
        //     ->join('area_restorants', function ($type) {
        //         $type->on('restorants.id', '=', 'area_restorants.restorant_id')
        //             ->where($this->areaConditionsArr);
        //     })
        //     ->join('branches', function ($type) {
        //         $type->on('restorants.id', '=', 'branches.restorant_id')
        //             ->whereIn('branches.id', $this->branchesIds)->orwhere('restorants.accepted', '=', true);
        //     })
        //     ->select('restorants.*')->distinct('restorants')->with(['branch' => function ($query) {
        //         $query->select('id', 'area_id', 'restorant_id', 'name', 'location_name', 'location_lat', 'location_lon', 'open_from', 'open_to', 'open_dayes', 'eat_in_branch', 'delever_to_car')->with('branchPhoto');
        //     }])->paginate(15);

        if ($area_location == 'location') {
            $restorants = Restorant::where($basicConditionsArr)
                ->join('type_restorants', function ($type) {
                    $type->on('restorants.id', '=', 'type_restorants.restorant_id')
                        ->where($this->typeConditionsArr);
                })
                ->join('branches', function ($type) {
                    $type->on('restorants.id', '=', 'branches.restorant_id')
                        ->whereIn('branches.id', $this->branchesIds);
                })
                ->select('restorants.id')->distinct('restorants')->get()->toArray();
        } else {
            $restorants = Restorant::where($basicConditionsArr)
                ->join('type_restorants', function ($type) {
                    $type->on('restorants.id', '=', 'type_restorants.restorant_id')
                        ->where($this->typeConditionsArr);
                })
                ->join('area_restorants', function ($type) {
                    $type->on('restorants.id', '=', 'area_restorants.restorant_id')
                        ->where($this->areaConditionsArr);
                })
                ->select('restorants.id')->distinct('restorants')->get()->toArray();
        }

        $restorantsArr = array_column($restorants, 'id');
        $restorants = Restorant::whereIn('id', $restorantsArr)->orderBy('priority', 'DESC')->orderBy('featured', 'DESC')->paginate(15);
        if (!empty($restorants)) {
            foreach ($restorants as $key => $value) {
                $rateAvg = $value->RestorantRating()->avg('rate');
                $branchesCount = Branch::where('restorant_id', $value->id)->count();
                if ($rateAvg == null) {
                    $rateAvg = 0;
                }
                $restorants[$key]['rate'] = $rateAvg;
                $restorants[$key]['branches'] = $branchesCount;
            }
        }
        return response()->json($restorants, 200);
    }

    public function notificationList()
    {
        $notifications = Notification::where('reciever_id', Auth::user()->id)->orderBy('created_at', 'DESC')->paginate(15);
        foreach ($notifications as $key => $notification) {
            $notifications[$key]->notification_body = json_decode($notification->notification_body);
        }
        return response()->json($notifications);
    }

    public function markNotificationAsRead($id)
    {
        $notification = Notification::find($id);
        $notification->is_read = true;
        $notification->save();
        return response()->json(['success' => true]);
    }
}

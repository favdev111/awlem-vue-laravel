<?php

namespace App\Http\Controllers\API;

use App\Area;
use App\AreaRestorant;
use App\Branch;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\BranchCollection;
use App\Restorant;
use App\RestorantRating;
use Illuminate\Support\Facades\DB;

class RestorantsController extends Controller
{
    public function searchRestorantsByArea(Request $request)
    {
        $area = Area::select('id', 'name')->with('restorants')->find($request->area_id);
        $categories = Category::select('id', 'name', 'photo')->get();
        foreach ($area->restorants as $key => $value) {
            $rateAvg = $value->RestorantRating()->avg('rate');
            $branchesCount = Branch::where('restorant_id', $value->id)->count();
            if ($rateAvg == null) {
                $rateAvg = 0;
            }
            $area->restorants[$key]['rate'] = $rateAvg;
            $area->restorants[$key]['branches'] = $branchesCount;
            unset($area->restorants[$key]['pivot'], $area->restorants[$key]['created_at'], $area->restorants[$key]['updated_at'], $area->restorants[$key]['user_id']);
        }
        unset($area->id);
        $area['categories'] = $categories;
        return response()->json($area, 200);
    }

    public function searchRestorantsByLocation(Request $request)
    {
        $restorants = DB::select("SELECT restorants.id,
        ROUND ( 
            ( 
                6371 * 
                acos( 
                    cos( radians(" . $request->lat . ") ) 
                    * cos( radians(branches.location_lat) ) 
                * cos( radians(branches.location_lon) - radians(" . $request->lon . ") ) 
                + sin( radians(" . $request->lat . ") ) 
                * sin(radians(branches.location_lat)) 
                ) 
                )
                ,2) 
            AS distance FROM branches LEFT JOIN restorants ON branches.restorant_id=restorants.id having distance <= 5");

        $restorantsIds = array_column($restorants, 'id');
        $categories = Category::select('id', 'name', 'photo')->get();
        if (!empty($restorantsIds)) {
            $restorantsNew = Restorant::whereIn('id', $restorantsIds)->get();
            foreach ($restorantsNew as $key => $value) {
                $rateAvg = $value->RestorantRating()->avg('rate');
                $branchesCount = Branch::where('restorant_id', $value->id)->count();
                if ($rateAvg == null) {
                    $rateAvg = 0;
                }
                $restorantsNew[$key]['rate'] = $rateAvg;
                $restorantsNew[$key]['branches'] = $branchesCount;
                unset($restorantsNew[$key]['pivot'], $restorantsNew[$key]['created_at'], $restorantsNew[$key]['updated_at'], $restorantsNew[$key]['user_id']);
            }
            $responcse['name'] = $request->area_name;
            $responcse['categories'] = $categories;
            $responcse['restorants'] = $restorantsNew;
            return response()->json($responcse, 200);
        } else {
            $responcse['name'] = $request->area_name;
            $responcse['categories'] = $categories;
            $responcse['restorants'] = $restorantsIds;
            return response()->json($responcse, 200);
        }
    }

    public function getRestorantBranches($restorantId)
    {
        // return new BranchCollection(Branch::where('restorant_id', $restorantId)->get());
        $branches = Branch::select('id', 'name', 'location_name', 'location_lat', 'location_lon', 'open_from', 'open_to', 'open_dayes', 'busy')->where('restorant_id', $restorantId)->with(array('branchPhoto' => function ($query) {
            $query->select('branch_id', 'photo');
        }))->get();

        // return $dd;
        foreach ($branches as $key => $branch) {
            $dd[0]['branch_id'] = $branch->id;
            $dd[0]['photo'] = 'images/defaultBranch.png';
            if (sizeof($branches[$key]->branchPhoto) <= 0) {
                unset($branches[$key]['branchPhoto']);
                $branches[$key]['branch_photo'] = $dd;
            }
        }
        return response()->json($branches, 200);
    }

    public function RestorantPage(Request $request)
    {
        $branch = Branch::select('id', 'restorant_id', 'name', 'location_name', 'location_lat', 'location_lon', 'open_from', 'open_to', 'description', 'eat_in_branch', 'delever_to_car')->with(array('branchPhoto' => function ($query) {
            $query->select('branch_id', 'photo');
        }))->find($request->branchId);

        $restorant = Restorant::select('id', 'featured_meals', 'name', 'photo')->with(array('meal' => function ($query) {
            $query->select('id', 'restorant_id', 'name');
        }, 'branch' => function ($query) {
            $query->select('id', 'restorant_id', 'name', 'location_name', 'location_lat', 'location_lon', 'open_from', 'open_to', 'open_dayes')->with(array('branchPhoto' => function ($query) {
                $query->select('branch_id', 'photo');
            }));
        }, 'RestorantRating' => function ($query) {
            $query->select('user_id', 'restorant_id', 'rate', 'review', 'created_at')->with(['user' => function ($query) {
                $query->select('id', 'name');
            }]);
        }))->find($branch->restorant_id);

        $rateAvg = $restorant->RestorantRating()->avg('rate');
        $branchesCount = $restorant->branch->count();
        $restorant->rate = $rateAvg;
        $restorant->branches = $branchesCount;
        $response['restorant'] = $restorant;
        $response['branch'] = $branch;
        return response()->json($response, 200);
    }

    public function BranchPageApp(Request $request)
    {
        $branch = Branch::select('id', 'restorant_id', 'name', 'location_name', 'location_lat', 'location_lon', 'open_from', 'open_to', 'description')->find($request->branchId);
        $restorant = Restorant::select('id', 'featured_meals', 'name', 'photo')->with(array('meal' => function ($query) {
            $query->select('id', 'restorant_id', 'name');
        }, 'RestorantRating' => function ($query) {
            $query->select('user_id', 'restorant_id', 'rate', 'review', 'created_at')->with(['user' => function ($query) {
                $query->select('id', 'name');
            }]);
        }))->find($branch->restorant_id);

        $rateAvg = $restorant->RestorantRating()->avg('rate');
        $branchesCount = $restorant->branch->count();
        $restorant->rate = $rateAvg;
        $restorant->branches = $branchesCount;
        $response['restorant'] = $restorant;
        unset($restorant->RestorantRating, $restorant->branch);
        $response['restorant']['branch'] = $branch;
        return response()->json($response, 200);
    }

    public function getBranchesByareasOrLatLon(Request $request)
    {
        if ($request->lat != null && $request->lon != null) {
            $branchesIds = DB::select("SELECT branches.id,
            ROUND ((6371 * acos(cos( radians(" . $request->lat . ") ) * cos( radians(branches.location_lat) ) * cos( radians(branches.location_lon) - radians(" . $request->lon . ") ) 
                    + sin( radians(" . $request->lat . ") ) 
                    * sin(radians(branches.location_lat)) 
                    ) 
                    )
                    ,2) 
                AS distance FROM branches WHERE branches.restorant_id = " . $request->restorantId . " having distance <= 1");
            $branchesIds = array_column($branchesIds, 'id');
            $branches = Branch::select('id', 'area_id', 'restorant_id', 'name', 'location_name', 'location_lat', 'location_lon', 'open_from', 'open_to', 'busy', 'open_dayes', 'eat_in_branch', 'delever_to_car')->with(array('branchPhoto' => function ($query) {
                $query->select('branch_id', 'photo');
            }))->whereIn('id', $branchesIds)->get();
        } elseif ($request->area_id != null) {
            $branches = Branch::select('id', 'area_id', 'restorant_id', 'name', 'location_name', 'location_lat', 'location_lon', 'open_from', 'open_to', 'busy', 'open_dayes', 'eat_in_branch', 'delever_to_car')->with(array('branchPhoto' => function ($query) {
                $query->select('branch_id', 'photo');
            }))->where('restorant_id', $request->restorantId)->where('area_id', $request->area_id)->get();
        } else {
            $branches = Branch::select('id', 'area_id', 'restorant_id', 'name', 'location_name', 'location_lat', 'location_lon', 'open_from', 'open_to', 'busy', 'open_dayes', 'eat_in_branch', 'delever_to_car')->with(array('branchPhoto' => function ($query) {
                $query->select('branch_id', 'photo');
            }))->where('restorant_id', $request->restorantId)->get();
        }

        if (!empty($branches)) {
            $nowDay = date('N');
            foreach ($branches as $key => $value) {
                $openDayesArray =  json_decode($value->open_dayes);
                if (in_array($nowDay, $openDayesArray)) {
                    $branches[$key]->open_close = true;
                } else {
                    $branches[$key]->open_close = false;
                }
                
                if (sizeof($value->branchPhoto) > 0) {
                    $branches[$key]->branch_photo = $branches[$key]->branchPhoto[0]->photo;
                    unset($branches[$key]['branchPhoto']);
                } else {
                    unset($branches[$key]['branchPhoto']);
                    $branches[$key]->branch_photo = 'images/defaultBranch.png';
                }
            }
            $restorant = Restorant::find($request->restorantId);
            $rateAvg = $restorant->RestorantRating()->avg('rate');
            $branchesCount = Branch::where('restorant_id', $request->restorantId)->count();
            if ($rateAvg == null) {
                $rateAvg = 0;
            }
            $restorant['rate'] = $rateAvg;
            $restorant['branches_count'] = $branchesCount;
            unset($restorant['created_at'], $restorant['updated_at'], $restorant['featured'], $restorant['user_id'], $restorant['accepted']);
            $restorant['branch'] = $branches;
        }
        return response()->json($restorant);
    }

    public function allRestorants()
    {
        $categories = Category::select('id', 'name', 'photo')->get();
        $restorants = Restorant::where('accepted', true)->get();
        if (!empty($restorants)) {
            foreach ($restorants as $key => $value) {
                $rateAvg = $value->RestorantRating()->avg('rate');
                $branchesCount = Branch::where('restorant_id', $value->id)->count();
                if ($rateAvg == null) {
                    $rateAvg = 0;
                }
                $restorants[$key]['rate'] = $rateAvg;
                $restorants[$key]['branches'] = $branchesCount;
                unset($restorants[$key]['pivot'], $restorants[$key]['created_at'], $restorants[$key]['updated_at'], $restorants[$key]['user_id']);
            }
            $responcse['categories'] = $categories;
            $responcse['restorants'] = $restorants;
            return response()->json($responcse, 200);
        } else {
            $responcse['categories'] = $categories;
            $responcse['restorants'] = [];
            return response()->json($responcse, 200);
        }
    }

    public function getAllCategories()
    {
        $categories = Category::select('id', 'name', 'photo')->get();
        return response()->json($categories, 200);
    }

    public function allRestorantsApp(Request $request)
    {
        $categories = Category::select('id', 'name', 'photo')->get();
        if (isset($request->type)) {
        }
        $restorants = Restorant::where('accepted', true)->paginate(10);
        if (!empty($restorants)) {
            foreach ($restorants as $key => $value) {
                $rateAvg = $value->RestorantRating()->avg('rate');
                $branchesCount = Branch::where('restorant_id', $value->id)->count();
                if ($rateAvg == null) {
                    $rateAvg = 0;
                }
                $restorants[$key]['rate'] = $rateAvg;
                $restorants[$key]['branches'] = $branchesCount;
                unset($restorants[$key]['pivot'], $restorants[$key]['created_at'], $restorants[$key]['updated_at'], $restorants[$key]['user_id']);
            }
            $responcse['categories'] = $categories;
            $responcse['restorants'] = $restorants;
            return response()->json($responcse, 200);
        } else {
            $responcse['categories'] = $categories;
            $responcse['restorants'] = [];
            return response()->json($responcse, 200);
        }
    }

    public function getRestorantCategories()
    {
        $response = Category::select('id', 'name')->get();
        return response()->json($response, 200);
    }

    public function branchReOrderDataToReorder($branch_id)
    {
        $branchData = Branch::select('id', 'restorant_id', 'location_name', 'eat_in_branch', 'delever_to_car')->with(['restorant' => function ($query) {
            $query->select('id', 'name', 'photo');
        }])->find($branch_id);
        $data['success'] = true;
        $data['data']['restName'] = $branchData->restorant->name;
        $data['data']['restPhoto'] = $branchData->restorant->photo;
        $data['data']['restLocation']  = $branchData->location_name;
        $data['data']['isInBranch'] = $branchData->eat_in_branch;
        $data['data']['isInCar'] = $branchData->delever_to_car;
        unset($branchData);
        return response()->json($data);
    }
}

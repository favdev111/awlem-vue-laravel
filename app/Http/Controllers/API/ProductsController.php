<?php

namespace App\Http\Controllers\API;

use App\Branch;
use App\BranchOffer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Restorant;
use Illuminate\Support\Facades\DB;

use function GuzzleHttp\json_decode;

class ProductsController extends Controller
{
    public function getProductsByBrancheIdMealId(Request $request)
    {
        $this->request = $request;
        $products = Product::join('product_meals', function ($join) {
            $join->on('products.id', '=', 'product_meals.product_id')
                ->where('product_meals.meal_id', $this->request->meal_id);
        })
            ->join('product_branches', function ($join) {
                $join->on('products.id', '=', 'product_branches.product_id')
                    ->where('product_branches.branch_id', $this->request->branch_id);
            })
            ->select('products.*','product_branches.available','product_branches.branch_id')
            ->get();
        return response()->json($products, 200);
    }

    public function getOneProduct(Request $request)
    {
        $product = Product::where('id', $request->id)->select('products.*')->with(array(
            'groupOptions' => function ($query) {
                $query->select('id', 'product_id', 'required_options', 'name', 'choices_numbers', 'allow_incriments');
            }
        ))
            ->first();
        $product->amount = doubleval($request->amount);
        $product->custom_requires = '';
        return response()->json($product, 200);
    }

    public function restorantsHasOffers()
    {
        $branchesIds = array_unique(array_column(BranchOffer::where('offer_end_date', '>=', date('Y-m-d H:i'))->where('active', true)->select('branch_id')->get()->toArray(), 'branch_id'));
        $restorantsIds = array_unique(array_column(Branch::select('restorant_id')->whereIn('id', $branchesIds)->get()->toArray(), 'restorant_id'));
        $restorants = Restorant::where('accepted', true)->whereIn('id', $restorantsIds)->paginate(10);
        if (!empty($restorants)) {
            foreach ($restorants as $key => $value) {
                $rateAvg = $value->RestorantRating()->avg('rate');
                $branchesCount = Branch::where('restorant_id', $value->id)->count();
                if ($rateAvg == null) {
                    $rateAvg = 0;
                }
                $restorants[$key]['rate'] = $rateAvg;
                $restorants[$key]['branches'] = $branchesCount;
                $restorants[$key]['branches_has_offers'] = $branchesIds;
                unset($restorants[$key]['created_at'], $restorants[$key]['updated_at'], $restorants[$key]['user_id'], $restorants[$key]['accepted']);
            }
        }
        return response()->json($restorants, 200);
    }

    public function restorantsHasOffersApp()
    {
        $branchesIds = array_unique(array_column(BranchOffer::where('offer_end_date', '>=', date('Y-m-d H:i'))->where('active', true)->select('branch_id')->get()->toArray(), 'branch_id'));
        $restorantsIds = array_unique(array_column(Branch::select('restorant_id')->whereIn('id', $branchesIds)->get()->toArray(), 'restorant_id'));
        $restorants = Restorant::where('accepted', true)->whereIn('id', $restorantsIds)->with(['branch' => function ($query) {
            $query->select('id', 'area_id', 'restorant_id', 'name', 'location_name', 'location_lat', 'location_lon', 'open_from', 'open_to', 'open_dayes')->with('branchPhoto');
        }])->paginate(10);
        if (!empty($restorants)) {
            $nowDay = date('N');
            foreach ($restorants as $key => $value) {
                foreach ($value->branch as $key2 => $value2) {
                    $openDayesArray =  json_decode($value2->open_dayes);
                    if (in_array($nowDay, $openDayesArray)) {
                        $restorants[$key]->branch[$key2]->open_close = true;
                    } else {
                        $restorants[$key]->branch[$key2]->open_close = false;
                    }
                    if (sizeof($value2->branchPhoto) > 0) {
                        $restorants[$key]->branch[$key2]->branch_photo = $restorants[$key]->branch[$key2]->branchPhoto[0]->photo;
                        unset($restorants[$key]->branch[$key2]->branchPhoto);
                    } else {
                        $restorants[$key]->branch[$key2]->branch_photo = '';
                    }
                }
                $rateAvg = $value->RestorantRating()->avg('rate');
                $branchesCount = Branch::where('restorant_id', $value->id)->count();
                if ($rateAvg == null) {
                    $rateAvg = 0;
                }
                $restorants[$key]['rate'] = $rateAvg;
                $restorants[$key]['branches_count'] = $branchesCount;
                unset($restorants[$key]['created_at'], $restorants[$key]['updated_at'], $restorants[$key]['user_id'], $restorants[$key]['accepted']);
            }
        }
        return response()->json($restorants, 200);
    }

    public function getBranchesHasOffers(Request $request)
    {
        $nowDay = date('N');
        $branches = Branch::select('id', 'area_id', 'restorant_id', 'name', 'location_name', 'location_lat', 'location_lon', 'open_from', 'open_to', 'open_dayes', 'busy')->with(array('branchPhoto' => function ($query) {
            $query->select('branch_id', 'photo');
        }))->whereIn('id', json_decode($request->branches_has_offers))->get();
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
                    unset($branches[$key]->branchPhoto);
                } else {
                    $branches[$key]->branch_photo = '';
                }
            }
            $restorant = Restorant::find($branches[0]->restorant_id);
            $rateAvg = $restorant->RestorantRating()->avg('rate');
            $branchesCount = Branch::where('restorant_id', $branches[0]->restorant_id)->count();
            if ($rateAvg == null) {
                $rateAvg = 0;
            }
            $restorant['rate'] = $rateAvg;
            $restorant['branches_count'] = $branchesCount;
            unset($restorant['created_at'], $restorant['updated_at'], $restorant['featured'], $restorant['user_id'], $restorant['accepted']);
            $restorant['branch'] = $branches;
        }else{
            $restorant = [];
        }
        return response()->json($restorant, 200);
    }

    public function getBranchOffers(Request $request)
    {
        $this->request = $request;
        $products = Product::join('branch_offers', function ($join) {
            $join->on('products.id', '=', 'branch_offers.product_id')
                ->where(['branch_offers.branch_id' => $this->request->branch_id, 'active' => true])->where('offer_end_date', '>=', date('Y-m-d H:i'));
        })
            ->select('products.*', 'branch_offers.amount')
            ->get();
        if (count($products) > 0) {
            $data['success'] = true;
            $data['data'] = $products;
        } else {
            $data['success'] = false;
            $data['data'] = $products;
        }

        return response()->json($data, 200);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meal;
use App\Product;
use App\ProductBranch;
use App\ProductGroup;
use App\ProductGroupOption;
use App\Restorant;
use Illuminate\Support\Facades\Auth;
use PDF;

class ProductsController extends Controller
{

    public function customer_invoice_download($id)
    {

        $pdf = PDF::loadView('myPDF');
        return $pdf->download('order.pdf');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function creatFromRestorant($restorantId)
    {
        $meals = Meal::where('restorant_id', '=', $restorantId)->pluck('name', 'id')->all();
        $branches = Branch::where('restorant_id', '=', $restorantId)->pluck('name', 'id')->all();
        return view('admin.products.creatFromRestorant', compact('meals', 'branches', 'restorantId'));
    }

    public function creatFromBranch($restorantId, $branchId)
    {
        $meals = Meal::where('restorant_id', '=', $restorantId)->pluck('name', 'id')->all();
        return view('admin.products.creatFromBranch', compact('meals', 'restorantId', 'branchId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    public function storeFromRestorant(Request $request)
    {
        // return $request;
        $validator =  $request->validate(
            [
                'price' => 'required',
                'name' => 'required',
                'description' => 'required',
                'ready_in' => 'required',
                'ready_to' => 'required',
                'max_additional_options' => 'required'

            ]
        );

        if ($request->file('photo')) {
            $photo =  $request->file('photo')->getClientOriginalName();
            $extension = pathinfo($photo, PATHINFO_EXTENSION);
            $name = 'awlem' . time() . '.' . $extension;
            $input['photo'] = $name;
        } else {
            $input['photo'] = '';
        }
        $product = Product::create([
            'restorant_id' => $request->restorant_id,
            'price' => $request->price,
            'name' => $request->name,
            'description' => $request->description,
            'ready_in' => $request->ready_in,
            'ready_to' => $request->ready_to,
            'photo' => $input['photo'],
            'max_additional_options' => $request->max_additional_options
        ]);

        $product->meals()->sync($request->meals);
        $product->branches()->sync($request->branches);
        if ($request->file('photo')) {
            $request->file('photo')->move('images/product/' . $product->id . '/photo', $input['photo']);
        }
        if ($request->group) {
            foreach ($request->group as $key => $value) {
                if (isset($value['required_options'])) {
                    $value['required_options'] = ($value['required_options'] == 'on') ? true : false;
                } else {
                    $value['required_options'] = false;
                }
                if (isset($value['allow_incriments'])) {
                    $value['allow_incriments'] = ($value['allow_incriments'] == 'on') ? true : false;
                } else {
                    $value['allow_incriments'] = false;
                }


                $group = ProductGroup::create([
                    'product_id' => $product->id,
                    'required_options' => $value['required_options'],
                    'allow_incriments' => $value['allow_incriments'],
                    'name' => $value['name'],
                    'choices_numbers' => $value['choices_numbers']
                ]);

                foreach ($value['options'] as $key2 => $value2) {
                    $option = ProductGroupOption::create([
                        'product_group_id' => $group->id,
                        'title' => $value2['title'],
                        'price' => $value2['price']
                    ]);
                }
            }
        }
        $product->photo = 'images/product/' . $product->id . '/photo/' . $input['photo'];
        $product->save();
        return redirect('admin/restorants/' . $request->restorant_id);
    }


    public function storeFromBranch(Request $request)
    {
        // return $request;
        $validator =  $request->validate(
            [
                'price' => 'required',
                'name' => 'required',
                'description' => 'required',
                'ready_in' => 'required',
                'ready_to' => 'required',
                'max_additional_options' => 'required'

            ]
        );
        if ($request->file('photo')) {
            $photo =  $request->file('photo')->getClientOriginalName();
            $extension = pathinfo($photo, PATHINFO_EXTENSION);
            $name = 'awlem' . time() . '.' . $extension;
            $input['photo'] = $name;
        }
        $product = Product::create([
            'restorant_id' => $request->restorant_id,
            'price' => $request->price,
            'name' => $request->name,
            'description' => $request->description,
            'ready_in' => $request->ready_in,
            'ready_to' => $request->ready_to,
            'photo' => $input['photo'],
            'max_additional_options' => $request->max_additional_options
        ]);
        $product->meals()->sync($request->meals);
        $product->branches()->sync([$request->branchId]);
        if ($request->file('photo')) {
            $request->file('photo')->move('images/product/' . $product->id . '/photo', $input['photo']);
        }
        if ($request->group) {
            foreach ($request->group as $key => $value) {
                if (isset($value['required_options'])) {
                    $value['required_options'] = ($value['required_options'] == 'on') ? true : false;
                } else {
                    $value['required_options'] = false;
                }
                if (isset($value['allow_incriments'])) {
                    $value['allow_incriments'] = ($value['allow_incriments'] == 'on') ? true : false;
                } else {
                    $value['allow_incriments'] = false;
                }


                $group = ProductGroup::create([
                    'product_id' => $product->id,
                    'required_options' => $value['required_options'],
                    'allow_incriments' => $value['allow_incriments'],
                    'name' => $value['name'],
                    'choices_numbers' => $value['choices_numbers']
                ]);

                foreach ($value['options'] as $key2 => $value2) {
                    $option = ProductGroupOption::create([
                        'product_group_id' => $group->id,
                        'title' => $value2['title'],
                        'price' => $value2['price']
                    ]);
                }
            }
        }

        $product->photo = 'images/product/' . $product->id . '/photo/' . $input['photo'];
        $product->save();
        return redirect('admin/branches/' . $request->branchId);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::with('orderProduct', 'groupOptions', 'meals', 'branches', 'restorant')->find($id);
        $user = Auth::user();
        if ($user->hasRole('Restorant') || $user->hasRole('Super Admin')) {
            $showDelete = true;
        } else {
            $showDelete = false;
        }
        return view('admin.products.show', ['product' => $product, 'showDelete' => $showDelete]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('groupOptions')->find($id);
        $meals = Meal::where('restorant_id', '=', $product->restorant_id)->pluck('name', 'id')->all();
        $productMeals = $product->meals->where('restorant_id', '=', $product->restorant_id)->pluck('id', 'id')->all();
        $restorants = Restorant::pluck('name', 'id');
        $branches = Branch::where('restorant_id', '=', $product->restorant_id)->pluck('name', 'id')->all();
        $productBranches = $product->branches->where('restorant_id', '=', $product->restorant_id)->pluck('id', 'id')->all();
        return view('admin.products.edit', compact('product', 'meals', 'branches', 'productMeals', 'productBranches', 'restorants'));
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
        // return $request;
        $validator =  $request->validate(
            [
                'restorant_id' => 'required',
                'price' => 'required',
                'name' => 'required',
                'description' => 'required',
                'ready_in' => 'required',
                'ready_to' => 'required',
                'max_additional_options' => 'required'

            ]
        );
        $product = Product::find($id);
        $product->meals()->sync($request->meals);
        $product->branches()->sync($request->branches);
        $input = $request->all();
        if ($request->oldDeletedGroups) {
            foreach ($request->oldDeletedGroups as $key => $value) {
                ProductGroup::where('id', $value['id'])->delete();
            }
        }
        if ($request->oldDeletedOptions) {
            foreach ($request->oldDeletedOptions as $key => $value) {
                ProductGroupOption::where('id', $value['id'])->delete();
            }
        }

        if ($request->file('photo')) {
            $photo =  $request->file('photo')->getClientOriginalName();
            $extension = pathinfo($photo, PATHINFO_EXTENSION);
            $name = 'awlem' . time() . '.' . $extension;
            $input['photo'] = 'images/product/' . $product->id . '/photo/' . $name;
            $request->file('photo')->move('images/product/' . $id . '/photo', $name);
        }
        if (Product::find($id)->update($input)) {
            if ($request->group) {
                foreach ($request->group as $key => $value) {
                    if (isset($value['required_options'])) {
                        $value['required_options'] = ($value['required_options'] == 'on') ? true : false;
                    } else {
                        $value['required_options'] = false;
                    }
                    if (isset($value['allow_incriments'])) {
                        $value['allow_incriments'] = ($value['allow_incriments'] == 'on') ? true : false;
                    } else {
                        $value['allow_incriments'] = false;
                    }

                    if ($value['version'] == 'new') {
                        $group = ProductGroup::create([
                            'product_id' => $id,
                            'required_options' => $value['required_options'],
                            'allow_incriments' => $value['allow_incriments'],
                            'name' => $value['name'],
                            'choices_numbers' => $value['choices_numbers']
                        ]);
                    } elseif ($value['version'] == 'old') {
                        $group = ProductGroup::find($key);
                        $group->product_id   = $id;
                        $group->required_options   = $value['required_options'];
                        $group->allow_incriments   = $value['allow_incriments'];
                        $group->name   = $value['name'];
                        $group->choices_numbers   = $value['choices_numbers'];
                        $group->save();
                    }

                    foreach ($value['options'] as $key2 => $value2) {
                        if ($value2['version'] == 'new') {
                            $option = ProductGroupOption::create([
                                'product_group_id' => $group->id,
                                'title' => $value2['title'],
                                'price' => $value2['price']
                            ]);
                        } elseif ($value2['version'] == 'old') {
                            $option = ProductGroupOption::find($key2);
                            $option->product_group_id   = $group->id;
                            $option->title   = $value2['title'];
                            $option->price   = $value2['price'];
                            $option->save();
                        }
                    }
                }
            }

            session()->flash('notif', __('General.modified_successfully'));
            return redirect('admin/products/' . $id);
        } else {
            session()->flash('notif', __('General.error'));
        }
    }

    public function getProductsByMealIdForAddOffer(Request $request)
    {
        $this->request = $request;
        $products = Product::where('restorant_id', $request->restorant_id)->select('name', 'id', 'price')->with(['meals' => function ($query) {
            $query->where('meal_id', $this->request->mealId);
        }])->get();
        foreach ($products as $key => $product) {
            if (sizeof($product->meals) == 0) {
                unset($products[$key]);
            } else {
                unset($products[$key]->meals);
            }
        }
        return $products;
    }

    public function deleteOffer($product_id, $branch_id)
    {
        $product = Product::find($product_id);
        $product->Offers()->detach($branch_id);
        return redirect('admin/branches/' . $branch_id);
    }

    public function EditOffer($restorant_id, $product_id, $branch_id, $amount, $percent, $active, $offer_end_date)
    {
        $meals = Meal::where('restorant_id', '=', $restorant_id)->withCount('product')->get();
        $product = Product::where('id', $product_id)->select('name', 'id', 'price')->first();
        return view('admin.products.edit_offer', ['meals' => $meals, 'branch_id' => $branch_id, 'restorant_id' => $restorant_id, 'product_id' => $product_id, 'product' => $product, 'amount' => $amount, 'percent' => $percent, 'offer_end_date' => $offer_end_date, 'active' => $active]);
    }

    public function storeOffer(Request $request)
    {
        $product = Product::find($request->product_id);
        $request->active = ($request->active == 'on') ? true : false;
        $product->Offers()->attach([
            $request->branch_id => ['offer_end_date' => $request->offer_end_date, 'active' => $request->active, 'percent' => $request->percent, 'amount' => $request->amount, 'user_id' => Auth::id()]
        ]);
        return redirect('admin/branches/' . $request->branch_id);
    }

    public function updateOffer(Request $request)
    {
        $product = Product::find($request->last_product_id);
        $product->Offers()->detach($request->branch_id);
        $product = Product::find($request->product_id);
        $request->active = ($request->active == 'on') ? true : false;
        $product->Offers()->attach([
            $request->branch_id => ['offer_end_date' => $request->offer_end_date, 'active' => $request->active, 'percent' => $request->percent, 'amount' => $request->amount, 'user_id' => Auth::id()]
        ]);
        return redirect('admin/branches/' . $request->branch_id);
    }

    public function getProductsByMealId(Request $request)
    {
        if ($request->flag == 1) {
            $result = Meal::with('branchProduct')->find($request->mealId);
            $loopresult = $result->branchProduct;
        } else {
            $result = Product::where('name', 'LIKE', '%' . $request->searchValue . '%')->where('restorant_id', '=', $request->resturantId)->with('branches')->get();
            $loopresult = $result;
        }
        $productArr = [];
        $branchesArr = [];
        // return $branchesArr;
        $selectedIds = [];
        foreach ($loopresult as $key => $Product) {
            if (sizeof($Product->branches) > 0) {
                foreach ($Product->branches as $key2 => $branch) {
                    $branchesArr[$key2] = $branch->id;
                }
            } else {
                $branchesArr = [];
            }

            if (in_array($request->branchId, $branchesArr)) {
                $productArr[$key]['id'] = $Product->id;
                $productArr[$key]['name'] = $Product->name;
                $productArr[$key]['checked'] = 'checked';
                array_push($selectedIds, $Product->id);
            } else {
                $productArr[$key]['id'] = $Product->id;
                $productArr[$key]['name'] = $Product->name;
                $productArr[$key]['checked'] = '';
            }
            unset($branchesArr);
        }
        unset($result);
        $finalResult['productArr'] = $productArr;
        $finalResult['checkedArr'] = $selectedIds;
        return $finalResult;
    }

    public function synkBranches(Request $request)
    {

        $oldIds = array_map('intval', explode(',', $request->oldProductArr));
        // return $oldIds;
        if ($request->product) {
            $productsIds = array_keys($request->product);
            $newArr = array_values($productsIds);
        } else {
            $newArr = [];
        }
        $branch = Branch::find($request->branchId);
        foreach ($oldIds as $key => $value) {
            if (!in_array($value, $newArr)) {
                $branch->Products()->detach($value);
            } else {
                if (($keyyy = array_search($value, $newArr)) !== false) {
                    unset($newArr[$keyyy]);
                }
            }
        }
        $branch->Products()->attach($newArr);
        return redirect('admin/branches/' . $request->branchId);
    }

    public function makeBranchProductUnAvailable(Request $request)
    {
        $product = Product::find($request->product_id);
        $product->branches()->detach($request->branch_id);
        $product->branches()->attach([
            $request->branch_id => ['available' => $request->available]
        ]);
        return response()->json(true);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // return $id;
        $data = Product::find($id);
        $restorant_id = $data->restorant_id;
        $data->branches()->sync([]);
        $data->meals()->sync([]);
        $data->Offers()->sync([]);
        Product::where('id', $id)->delete();
        session()->flash('notif', __('General.deleted_successfully'));
        return redirect('admin/restorants/' . $restorant_id);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(18);
        return view('admin.categories.view', ['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  $request->validate(
            [
                'name' => 'required',
                'photo'    => 'required|max:10000|mimes:jpg,jpeg,png',
            ],
            [
                'name.required' => trans('اسم القسم مطلوب'),
                'photo.required'   => trans('صورة القسم مطلوبه'),
                'photo.max'   => trans('حجم الصورة غير مسموح'),
                'photo.mimes'   => trans('امتداد الصورة غير مسموح'),
            ]
        );
        $photo =  $request->file('photo')->getClientOriginalName();
        $extension = pathinfo($photo, PATHINFO_EXTENSION);
        // return $extension;
        $input = $request->all();
        if ($request->file('photo')) {
            $input['photo'] = 'awlem' . time() . '.' . $extension;
        }
        $category = Category::create([
            'name' => $request->name,
            'photo' => $input['photo'],
        ]);

        if ($request->file('photo')) {
            $category->photo = 'images/category/' . $category->id . '/photo/' . $input['photo'];
            $category->save();
            $request->file('photo')->move('images/category/' . $category->id . '/photo', $input['photo']);
        }
        session()->flash('notif', __('General.added_successfully'));
        return redirect('admin/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::with('restorant')->find($id);
        // return $category;
        return view('admin.categories.show', ['category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', [
            'category' => $category
        ]);
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
        // return  $request->all();
        $validator =  $request->validate(
            [
                'name'             => 'required'
            ]
        );
        $input = $request->all();
        if ($request->file('photo')) {
            $photo =  $request->file('photo')->getClientOriginalName();
            $extension = pathinfo($photo, PATHINFO_EXTENSION);
            $input['photo'] = 'images/category/' . $id . '/photo/' . 'awlem' . time() . '.' . $extension;
            $request->file('photo')->move('images/category/' . $id . '/photo', 'awlem' . time() . '.' . $extension);
        }
        if (Category::find($id)->update($input)) {
            session()->flash('notif', __('General.modified_successfully'));
            return redirect('admin/categories');
        } else {
            session()->flash('notif', __('General.error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        session()->flash('notif', __('General.deleted_successfully'));
        return redirect('admin/categories');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Type;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::paginate(18);
        return view('admin.types.view', ['types' => $types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.types.add');
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
        $input = $request->all();
        if ($request->file('photo')) {
            $photo =  $request->file('photo')->getClientOriginalName();
            $extension = pathinfo($photo, PATHINFO_EXTENSION);
            $name = 'awlem' . time() . '.' . $extension;
            $input['photo'] = $name;
        }
        $type = Type::create([
            'name' => $request->name,
            'photo' => $input['photo'],
        ]);
        $type->photo = 'images/type/' . $type->id . '/photo/' . $input['photo'];
        $type->save();
        if ($request->file('photo')) {
            $request->file('photo')->move('images/type/' . $type->id . '/photo', $input['photo']);
        }
        session()->flash('notif', __('General.added_successfully'));
        return redirect('admin/types');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = Type::with('restorants')->find($id);
        // return $type;
        return view('admin.types.show', ['type' => $type]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = Type::find($id);
        return view('admin.types.edit', [
            'type' => $type
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
        $validator =  $request->validate(
            [
                'name' => 'required'
            ],
            [
                'name.required' => trans('اسم القسم مطلوب'),
            ]
        );
        $data = Type::find($id);

        $input = $request->all();
        if ($request->file('photo')) {
            $photo =  $request->file('photo')->getClientOriginalName();
            $extension = pathinfo($photo, PATHINFO_EXTENSION);
            $name = 'awlem' . time() . '.' . $extension;
            $input['photo'] = 'images/type/' . $id . '/photo/' . $name;
            $request->file('photo')->move('images/type/' . $id . '/photo', $name);
        } else {
            $input['photo'] = $data->photo;
        }
        $data->name        = $request->name;
        $data->photo        = $input['photo'];

        $data->save();

        session()->flash('notif', __('General.modified_successfully'));

        return redirect('admin/types');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Type::where('id', $id)->delete();
        session()->flash('notif', __('General.deleted_successfully'));
        return redirect('admin/types');
    }
}

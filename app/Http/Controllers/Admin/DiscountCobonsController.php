<?php

namespace App\Http\Controllers\Admin;

use App\DiscountCobon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiscountCobonsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cobons = DiscountCobon::paginate(18);
        return view('admin.discountCobons.view', ['cobons' => $cobons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discountCobons.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // return $request;
        $validator =  $request->validate(
            [
                'code' => 'required',
                'price' => 'required',
                'dicount_percentage' => 'required',
                'active' => 'required',
                'end_date' => 'required',
            ]
        );
        $request->active = ($request->active == 'on') ? true : 'false';
        $cobon = DiscountCobon::create([
            'code' => $request->code,
            'price' => $request->price,
            'dicount_percentage' => $request->dicount_percentage,
            'active' => $request->active,
            'end_date' => $request->end_date,
        ]);

        session()->flash('notif', __('General.added_successfully'));
        return redirect('admin/discountCobons');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cobon = DiscountCobon::find($id);
        return view('admin.discountCobons.edit', [
            'cobon' => $cobon
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
        //TODO Check Valid Date
        // return $request;
        $validator =  $request->validate(
            [
                'code'            => 'required',
                'price'            => 'required',
                'dicount_percentage'            => 'required',
                'end_date'            => 'required',

            ]
        );
        $data = DiscountCobon::find($id);
        $request->active = ($request->active == 'on') ? true : false;
        $data->code        = $request->code;
        $data->price        = $request->price;
        $data->dicount_percentage        = $request->dicount_percentage;
        $data->active        = $request->active;
        $data->end_date        = $request->end_date;

        $data->save();

        session()->flash('notif', __('General.modified_successfully'));

        return redirect('admin/discountCobons');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DiscountCobon::where('id', $id)->delete();
        session()->flash('notif', __('General.deleted_successfully'));
        return redirect('admin/discountCobons');
    }
}

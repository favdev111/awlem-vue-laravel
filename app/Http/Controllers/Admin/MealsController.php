<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Meal;

class MealsController extends Controller
{
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

    public function storeFromRestorant(Request $request, $restorantId)
    {
        $branch = Meal::create([
            'name' => $request->name,
            'restorant_id' => $request->restorantId
        ]);

        session()->flash('notif', __('General.added_successfully'));
        return redirect('admin/restorants/' . $restorantId);
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
        $input = $request->all();
        Meal::find($id)->update($input);
        session()->flash('notif', __('General.modified_successfully'));
        if ($request->from_restorant == true) {
            return redirect('admin/restorants/' . $request->restorant_id);
        } elseif ($request->from_restorant == false) {
            return redirect('admin/meals');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $data = Meal::find($id);
        $data->product()->sync([]);
        Meal::where('id', $id)->delete();
        session()->flash('notif', __('General.deleted_successfully'));
        if ($request->from_restorant == true) {
            return redirect('admin/restorants/' . $request->restorant_id);
        } elseif ($request->from_restorant == false) {
            return redirect('admin/meals');
        }
    }
}

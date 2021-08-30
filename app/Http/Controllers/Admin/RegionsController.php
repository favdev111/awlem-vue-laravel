<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Region;

class RegionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $regions = Region::paginate(18);
        return view('admin.regions.view', ['regions' => $regions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.regions.add');
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
            ]
        );
        Region::create([
            'name' => $request->name
        ]);
        session()->flash('notif', __('General.added_successfully'));
        return redirect('admin/regions');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $region = Region::with('area')->find($id);
        // return $region;
        return view('admin.regions.show',['region' => $region]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $region = Region::find($id);
        return view('admin.regions.edit', [
            'region' => $region
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
                'name'             => 'required'
            ]
        );
        $input = $request->all();
        if (Region::find($id)->update($input)) {
            session()->flash('notif', __('General.modified_successfully'));
            return redirect('admin/regions');
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
        Region::where('id', $id)->delete();
        session()->flash('notif', __('General.deleted_successfully'));
        return redirect('admin/regions');
    }
}

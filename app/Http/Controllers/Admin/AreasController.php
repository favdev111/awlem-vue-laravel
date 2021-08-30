<?php

namespace App\Http\Controllers\Admin;

use App\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Region;

class AreasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $areas = Area::with('region')->paginate(18);
        // return $areas;
        return view('admin.areas.view', ['areas' => $areas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regions = Region::pluck('name','id');
        return view('admin.areas.add',[
            'regions'        =>$regions
        ]);
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
                'region_id' => 'required',
            ]
        );
        Area::create([
            'name' => $request->name,
            'region_id' => $request->region_id,
        ]);
        session()->flash('notif', __('General.added_successfully'));
        return redirect('admin/areas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $area = Area::with('region', 'restorants')->find($id);
        // return $area;
        return view('admin.areas.show', ['area' => $area]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $area = Area::find($id);
        $regions = Region::pluck('name','id');
        return view('admin.areas.edit',[
            'regions'        =>$regions,
            'area'        =>$area
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
                'name'             => 'required',
                'region_id'             => 'required',
            ]
        );
        $input = $request->all();
        if (Area::find($id)->update($input)) {
            session()->flash('notif', __('General.modified_successfully'));
            return redirect('admin/areas');
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
        Area::where('id', $id)->delete();
        session()->flash('notif', __('General.deleted_successfully'));
        return redirect('admin/areas');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Feature;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FeaturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $features = Feature::paginate(18);
        return view('admin.features.view', ['features' => $features]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
        $feature = Feature::find($id);
        return view('admin.features.edit', [
            'feature' => $feature
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
                'title'             => 'required',
                'description'             => 'required'
            ]
        );
        $input = $request->all();
        if ($request->file('imge')) {
            $photo =  $request->file('imge')->getClientOriginalName();
            $extension = pathinfo($photo, PATHINFO_EXTENSION);
            $name = 'awlem' . time() . '.' . $extension;
            $input['imge'] = 'images/feature/' . $id . '/imge/' . $name;
            $request->file('imge')->move('images/feature/' . $id . '/imge', $name);
        }
        if (Feature::find($id)->update($input)) {
            session()->flash('notif', __('General.modified_successfully'));
            return redirect('admin/features');
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
        //
    }
}

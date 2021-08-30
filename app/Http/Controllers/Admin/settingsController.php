<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Setting;

class settingsController extends Controller
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
        $settings = Setting::find($id);
        return view('admin.settings.edit', ['data' => $settings]);
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
        $data = Setting::find($id);
        $input = $request->all();
        if ($request->file('olum_card_1_photo')) {
            $photo =  $request->file('olum_card_1_photo')->getClientOriginalName();
            $extension = pathinfo($photo, PATHINFO_EXTENSION);
            $name = 'awlem' . time() . '.' . $extension;
            $input['olum_card_1_photo'] = 'images/olum_card/' . $name;
            $request->file('olum_card_1_photo')->move('images/olum_card/', $name);
        }else{
            $input['olum_card_1_photo'] = $data->olum_card_1_photo;
        }

        if ($request->file('olum_card_2_photo')) {
            $photo =  $request->file('olum_card_2_photo')->getClientOriginalName();
            $extension = pathinfo($photo, PATHINFO_EXTENSION);
            $name = 'awlem' . time() . '.' . $extension;
            $input['olum_card_2_photo'] = 'images/olum_card/' . $name;
            $request->file('olum_card_2_photo')->move('images/olum_card/', $name);
        }else{
            $input['olum_card_2_photo'] = $data->olum_card_2_photo;
        }

        if ($request->file('olum_card_3_photo')) {
            $photo =  $request->file('olum_card_3_photo')->getClientOriginalName();
            $extension = pathinfo($photo, PATHINFO_EXTENSION);
            $name = 'awlem' . time() . '.' . $extension;
            $input['olum_card_3_photo'] = 'images/olum_card/' . $name;
            $request->file('olum_card_3_photo')->move('images/olum_card/', $name);
        }else{
            $input['olum_card_3_photo'] = $data->olum_card_3_photo;
        }
        if (Setting::find($id)->update($input)) {
            session()->flash('notif', __('General.modified_successfully'));
            return redirect('admin/settings/1/edit');
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

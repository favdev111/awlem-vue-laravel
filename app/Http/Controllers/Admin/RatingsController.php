<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rating;
use App\User;

class RatingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Rating::with('user')->paginate(18);
        // return $data;
        return view('admin.ratings.view', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name', 'id');
        return view('admin.ratings.add', ['users' => $users]);
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
                'rate' => 'required',
                'review'  => 'required',
                'user_id'  => 'required',
            ],
            [
                'rate.required' => trans('قيمة التقييم مطلوبة'),
                'review.required'   => trans('التقييم مطلوب'),
                'user_id.required'  => trans('صاحب التقييم مطلوب')
            ]
        );
        $request->active = ($request->active == 'on') ? true : false;
        Rating::create([
            'user_id' => $request->user_id,
            'active' => $request->active,
            'rate' => $request->rate,
            'review' => $request->review,
        ]);


        return redirect('admin/ratings');
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
        $data = Rating::find($id);
        $users = User::pluck('name', 'id');
        return view('admin.ratings.edit', ['data' => $data, 'users' => $users]);
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
                'rate' => 'required',
                'review'  => 'required',
                'user_id'  => 'required',
            ],
            [
                'rate.required' => trans('قيمة التقييم مطلوبة'),
                'review.required'   => trans('التقييم مطلوب'),
                'user_id.required'  => trans('صاحب التقييم مطلوب')
            ]
        );


        $data = Rating::find($id);
        $data->rate  = $request->rate;
        $data->review   = $request->review;
        $data->user_id   = $request->user_id;
        $data->active = ($request->active == 'on') ? true : false;

        $data->save();

        return redirect('admin/ratings');
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

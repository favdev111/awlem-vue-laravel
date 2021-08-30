<?php

namespace App\Http\Controllers\Admin;

use App\Complaint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ComplaintsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Complaint::with('user')->paginate(18);
        // return $data;
        return view('admin.complaints.view', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::pluck('name', 'id');
        return view('admin.complaints.add', ['users' => $users]);
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
                'body'  => 'required',
                'user_id'  => 'required',
            ],
            [
                'name.required' => trans('اسم الشكوي مطلوب'),
                'body.required'   => trans('محتوي الشكوي مطلوب'),
                'user_id.required'  => trans('مقدم الشكوي مطلوب')
            ]
        );
        Complaint::create([
            'name' => $request->name,
            'body' => $request->body,
            'user_id' => $request->user_id,
        ]);


        return redirect('admin/complaints');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $complaint = Complaint::with('user')->find($id);
        // return $category;
        return view('admin.complaints.show', ['complaint' => $complaint]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Complaint::find($id);
        $users = User::pluck('name', 'id');
        return view('admin.complaints.edit', ['data' => $data, 'users' => $users]);
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
                'name' => 'required',
                'body'  => 'required',
                'user_id'  => 'required',
            ],
            [
                'name.required' => trans('اسم الشكوي مطلوب'),
                'body.required'   => trans('محتوي الشكوي مطلوب'),
                'user_id.required'  => trans('مقدم الشكوي مطلوب')
            ]
        );


        $data = Complaint::find($id);

        $data->name  = $request->name;
        $data->body   = $request->body;
        $data->user_id   = $request->user_id;

        $data->save();

        return redirect('admin/complaints');
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

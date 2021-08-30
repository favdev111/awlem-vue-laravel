<?php

namespace App\Http\Controllers\Admin;

use App\Complaint;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Validator;

class ClientsController extends Controller
{


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('hasAdminAccess', 'false')->paginate(100);
        return view('admin.clients.index', ['data' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_id = trans('Users.user_type_id');
        $user_status = trans('Users.user_status');
        $user_language = trans('Users.user_language');
        return view('admin.clients.add', [
            'type_id'      => $type_id,
            'user_status'  => $user_status,
            'user_language' => $user_language
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
                'name'             => 'required',
                'password'         => 'required|min:8',
                'email'            => 'required|email|unique:users',
                'phone'            => 'required|string|min:10|max:14|unique:users',
            ],
            [
                'name.required'             => trans('Users.name_error'),
                'password.required'         => trans('Users.password_error'),
                'email.required'            => trans('Users.email_error'),
                'phone.required'            => trans('Users.phone_error'),
            ]
        );
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        User::create($input);
        return redirect('admin/clients');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $complaints = Complaint::where('user_id', $id)->orderByRaw('updated_at DESC')->get();
        $orders = Order::where('user_id', $id)->orderByRaw('updated_at DESC')->paginate(5);
        return view('admin.clients.show', compact('user', 'complaints', 'orders'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user  = User::find($id);
        $userRole = $user->roles->pluck('name', 'name')->all();
        $user_status = trans('Users.user_status');
        return view('admin.clients.edit', compact('user', 'user_status'));
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
                'email'            => 'required|email|unique:users,email,' . $id,
                'phone'            => 'required|string|min:10|max:14|unique:users,phone,' . $id,
            ],
            [
                'name.required'             => trans('Users.name_error'),
                'email.required'            => trans('Users.email_error'),
                'phone.required'            => trans('Users.phone_error'),
            ]
        );
        $user = User::find($id);
        $input = $request->all();
        if ($request->password) {
            $input['password'] = bcrypt($request->password);
        } else {
            $input['password'] = $user->password;
        }
        $user->update($input);
        $user->save();
        return redirect('admin/clients');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/clients');
    }
    
}

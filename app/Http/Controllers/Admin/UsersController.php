<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use App\User;
use Illuminate\Support\Facades\DB;
//use Validator;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'Role' => ['required'],
        ]);
    }

    public function index()
    {
        $users = User::where('hasAdminAccess', 'true')->paginate(10);
        return view('admin.users.index', ['data' => $users]);
    }

    public function addRestorantEmployee($restorantId)
    {
        $user_status = trans('Users.user_status');
        return view('admin.users.addRestorantEmployee', [
            'user_status'  => $user_status,
            'restorantId'  => $restorantId,
        ]);
    }

    public function storeRestorantEmployee(Request $request)
    {
        $validator =  $request->validate(
            [
                'name'             => 'required',
                'address'             => 'required',
                'password'         => 'required|min:8',
                'email'            => 'required|email|unique:users',
                'phone'            => 'required|string|min:10|max:14|unique:users',
            ],
            [
                'address.required'             => trans('العنوان مطلوب'),
                'name.required'             => trans('Users.name_error'),
                'password.required'         => trans('Users.password_error'),
                'email.required'            => trans('Users.email_error'),
                'phone.required'            => trans('Users.phone_error'),
            ]
        );

        $input = $request->all();
        $input['hasAdminAccess'] = true;
        $input['password'] = bcrypt($input['password']);
        $user              = User::create($input);
        $user->assignRole([6]);
        session()->flash('notif', __('General.added_successfully'));
        return redirect('admin/restorants/' . $request->parent_restorant);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        $type_id = trans('Users.user_type_id');
        $user_status = trans('Users.user_status');
        $user_language = trans('Users.user_language');
        return view('admin.users.add', [
            'roles'        => $roles,
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
        $input['hasAdminAccess'] = 'true';
        $input['password'] = bcrypt($input['password']);
        $user              = User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect('admin/users');
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
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user  = User::with('roles')->find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        $user_status = trans('Users.user_status');
        $user_language = trans('Users.user_language');
        return view('admin.users.edit', compact('user', 'roles', 'userRole', 'user_status', 'user_language'));
    }

    public function editRestorantUser($id, $restorantId)
    {
        $user  = User::find($id);
        return view('admin.users.edit_restorant_user', compact('user', 'restorantId'));
    }

    public function updateRestorantUser(Request $request, $id)
    {
        $user = User::find($id);
        $input = $request->all();
        if ($request->password) {
            $input['password'] = bcrypt($request->password);
        } else {
            $input['password'] = $user->password;
        }
        User::find($id)->update($input);
        session()->flash('notif', __('General.modified_successfully'));
        return redirect('admin/restorants/' . $request->restorantId);
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
                'hasAdminAccess'   => 'required',
                'roles' => 'required'
            ],
            [
                'name.required'             => trans('Users.name_error'),
                'email.required'            => trans('Users.email_error'),
                'hasAdminAccess.required'   => trans('Users.hasAdminAccess_error'),
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
        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect('admin/users');
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
        return redirect('admin/users');
    }


    private function getYearMonths()
    {
        return array('', 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec');
    }
    public function getUsersDaily($type)
    {
        $year = date('Y');
        $month = date('n');
        $day = date('j');
        $hour = date('G');

        $prev12HoursHour = date('G', strtotime('-12 hours', strtotime(date("Y-m-d H:i:s"))));

        $months = $this->getYearMonths();

        $usersData = [];
        $i = 12;

        do {
            if ($hour < 0) {
                $newYear = date('Y', strtotime('-1 day', strtotime($year . '-' . $month . '-' . $day)));
                $newMonth = date('m', strtotime('-1 day', strtotime($year . '-' . $month . '-' . $day)));
                $newDay = date('j', strtotime('-1 day', strtotime($year . '-' . $month . '-' . $day)));

                $year = $newYear;
                $month = $newMonth;
                $day = $newDay;
                $hour = 23;
            }
            $date = $year . '-' . $month . '-' . $day . ' ' . $hour;
            if ($type == 'admins') {
                $users = User::where('hasAdminAccess', 'true')->whereDate('created_at', '=', $date)->count();
            } elseif ($type == 'user') {
                $users = User::where('hasAdminAccess', 'false')->whereDate('created_at', '=', $date)->count();
            }
            // $users = User::whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->whereDay('created_at', '=', $day)->whereHour('created_at', '=', $hour)->count();
            array_unshift($usersData, $users);
            $hour--;
            $i--;
        } while ($i > 0);

        echo json_encode(compact('usersData'));
        exit();
    }
    public function getUsersMonthly($type)
    {
        $year = date('Y');
        $month = date('n');
        $currentDay = date('j');

        $months = $this->getYearMonths();

        $day = $currentDay;

        $usersData = [];
        $i = 31;
        do {
            if ($day < 1) {
                $newYear = date('Y', strtotime('-1 day', strtotime($year . '-' . $month . '-' . $day)));
                $newMonth = date('n', strtotime('-1 day', strtotime($year . '-' . $month . '-' . $day)));

                $year = $newYear;
                $month = $newMonth;
                $day = date('t', strtotime($year . '-' . $month));
            }
            if ($type == 'admins') {
                $users = User::where('hasAdminAccess', 'true')->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->whereDay('created_at', '=', $day)->count();
            } elseif ($type == 'user') {
                $users = User::where('hasAdminAccess', 'false')->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->whereDay('created_at', '=', $day)->count();
            }
            $day--;
            array_unshift($usersData, $users);
            $i--;
        } while ($i > 0);
        echo json_encode(compact('usersData'));
        exit();
    }

    public function getUsersWeekly($type)
    {
        $year = date('Y');
        $month = date('n');
        $day = date('j');

        $months = $this->getYearMonths();

        $lastWeekDay = date('j', strtotime("-8 days"));
        $usersData = [];
        $i = 7;
        do {
            if ($day < 1) {
                $newYear = date('Y', strtotime('-1 month', strtotime($year . '-' . $month)));
                $newMonth = date('n', strtotime('-1 month', strtotime($year . '-' . $month)));

                $year = $newYear;
                $month = $newMonth;
                $day = date('t', strtotime($year . '-' . $month));
            }
            $date = $year . '-' . $month . '-' . $day;
            if ($type == 'admins') {
                $users = User::where('hasAdminAccess', 'true')->whereDate('created_at', '=', $date)->count();
            } elseif ($type == 'user') {
                $users = User::where('hasAdminAccess', 'false')->whereDate('created_at', '=', $date)->count();
            }
            array_unshift($usersData, $users);
            $day--;
            $i--;
        } while ($i > 0);

        echo json_encode(compact('usersData'));
        exit();
    }

    public function getUsersYearly($type)
    {
        $year = date('Y');
        $currentMonth = date('n');
        $months = $this->getYearMonths();
        $month = $currentMonth;
        $usersData = [];
        $i = 12;
        do {
            if ($month < 1) {
                $month = 12;
                $year--;
            }
            $date = $year . '-' . $month;
            if ($type == 'admins') {
                $users = User::where('hasAdminAccess', 'true')->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->count();
            } elseif ($type == 'user') {
                $users = User::where('hasAdminAccess', 'false')->whereYear('created_at', '=', $year)->whereMonth('created_at', '=', $month)->count();
            }
            array_unshift($usersData, $users);
            $month--;
            $i--;
        } while ($i > 0);

        echo json_encode(compact('usersData'));
        exit();
    }
}

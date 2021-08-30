<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;
use Validator;


class RolesController extends Controller
{

    public function __construct()
    {
        $black_list_controller = ['OpenHandlerController', 'TypeRestorantsController', 'ClientController', 'RestorantRatingsController', 'ProductGroupOptionsController', 'ProductGroupsController', 'ProductMealsController', 'OrderProductsController', 'OrderRatingsController', 'AreaRestorantsController', 'BranchPhotosController', 'BranchRatingsController', 'HomeController', 'ActivitiesController', 'TelescopeController', 'AssetController', 'CacheController', 'AuthorizationController', 'ApproveAuthorizationController', 'DenyAuthorizationController', 'AccessTokenController', 'AuthorizedAccessTokenController', 'TransientTokenController', 'ScopeController', 'PersonalAccessTokenController', 'LoginController', 'RegisterController', 'ForgotPasswordController', 'ResetPasswordController', 'AdminLoginController', 'RolesController', 'NewController', 'PermissionsController'];

        foreach (Route::getRoutes()->getRoutes() as $route) {
            $action = $route->getAction();
            if ($action['middleware'][0] != 'api') {
                if (array_key_exists('controller', $action)) {
                    $action['controller'] = \explode("\\", $action['controller']);
                    $controller = \explode("@", end($action['controller']));
                    $controllers[$controller[0]][] = $controller[1];
                    if (!in_array($controller[0], $black_list_controller)) {
                        ModelsPermission::firstOrCreate([
                            'name' => $controller[0] . "_" . $controller[1]
                        ]);
                    } else {
                    }
                }
            }
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::get();
        return view('admin.roles.index', ['roles' => $roles]);
        //return Role::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =  $request->validate([
            'name' => 'required|unique:roles',
        ]);
        $role = Role::create(['name' => $request->name]);
        return redirect('admin/roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        $rolePermissions = ModelsPermission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();


        return view('admin.roles.show', compact('role', 'rolePermissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permission = ModelsPermission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();
        return view('admin.roles.edit', compact('role', 'permission', 'rolePermissions'));
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

        $this->validate($request, [
            'name' => 'required'
        ]);


        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();


        $role->syncPermissions($request->input('permission'));
        $roles = Role::get();
        return view('admin.roles.index', ['roles' => $roles]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect('admin/roles');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function _addPermissions()
    {
        foreach (Route::getRoutes()->getRoutes() as $route) {
            $action = $route->getAction();

            if (array_key_exists('controller', $action)) {
                // You can also use explode('@', $action['controller']); here
                // to separate the class name from the method
                $action['controller'] = \explode("\\", $action['controller']);
                $controller = \explode("@", end($action['controller']));
                $controllers[$controller[0]][] = $controller[1];
                //Adding Permissions
                $permission = Permission::findOrCreate($controller[0] . "_" . $controller[1]);
            }
        }
        return $controllers;
    }

    public function getControllerPermissions($controller)
    {
        foreach (Route::getRoutes()->getRoutes() as $route) {
            $action = $route->getAction();

            if (array_key_exists('controller', $action)) {
                // You can also use explode('@', $action['controller']); here
                // to separate the class name from the method
                $action['controller'] = \explode("\\", $action['controller']);
                $controller = \explode("@", end($action['controller']));
                $controllers[$controller[0]][] = $controller[1];
                //Adding Permissions

                $permission = Permission::findOrCreate($controller[0] . "_" . $controller[1]);
            }
        }
        return $controllers;
    }

    public function getRoles()
    {
        //$roles = Role::with('permissions')->get();
        $roles = Role::get();
        return $roles;
    }
    public function index()
    {
        // return "NAder";
        //check if there is new permissions
        $allControllers = $this->_addPermissions();
        $allRoles       = $this->getRoles();
        // session()->flash('notif',__('General.modified_successfully'));
        return view("admin.permissions.showControllersActions", ["controllers" => $allControllers]);
    }

    public function indexPost(Request $request)
    {
        //remove permission 
        foreach ($request->pre as $values) {
            $roles = Role::get();
            foreach ($roles as $v) {
                $permission = Permission::find($values);
                $v->revokePermissionTo($permission->name);
            }
        }

        foreach ($request->roles as $key => $values) {
            //echo $key;
            $role = Role::find($key);
            foreach ($values as $v) {
                $permission = Permission::find($v);
                $role->givePermissionTo($permission->name);
            }
        }
        //$role->givePermissionTo('edit articles');

        //$role->hasPermissionTo('edit articles');
        //return $request->all();
        return redirect('admin/permissions');
    }

    public function controllersactions(Request $request)
    {
        $permissions = $this->_addPermissions()[$request->controller];
        $roles = Role::with('permissions')->get();
        $allPermissions = Permission::get();
        $focusedPermission = [];
        $fullPermission = [];
        for ($i = 0; $i < count($permissions); $i++) {
            $fullPermission[] = $request->controller . "_" . $permissions[$i];
        }
        foreach ($allPermissions as $values) {
            if (\in_array($values->name, $fullPermission)) {
                $focusedPermission[] = $values;
            }
        }

        /*for($i=0;$i<count($focusedPermission);$i++){
            $focusedPermission[$i]->role =  Permission::find($focusedPermission[$i]->id)->with('role');
        }*/

        return [
            "controller" => $request->controller,
            "roles" => $roles,
            "permissions" => $fullPermission,
            'actions' => $focusedPermission
        ];
    }
    public function indexx(Request $request)
    {
        $controllers = [];
        $controller;
        // return $request;
        foreach (Route::getRoutes()->getRoutes() as $route) {
            $action = $route->getAction();

            if (array_key_exists('controller', $action)) {
                // You can also use explode('@', $action['controller']); here
                // to separate the class name from the method
                $action['controller'] = \explode("\\", $action['controller']);
                $controller = \explode("@", end($action['controller']));
                $controllers[$controller[0]][] = $controller[1];
                //$controllers[] = end($action['controller']);
            }
        }
        $actions = [];
        $i = 0;
        if ($request->controller) {
            //get groups
            //get Controller actions
            $actions = $controllers[$request->controller];
            $controller = $request->controller;
            //$actions[$i]['permission'] = $request->controller."@".$controllers[$request->controller];
        }
        if ($request->roles) {
            //$role = Role //Permission::create(['name' => 'edit articles admin']);
            //return Permission::create(['name'=>'RolesController_index']);
            $app = [];
            foreach ($request->roles as $v) {
                //"admin=RolesController/index"
                $e = \explode("=", $v);
                $r = $e[0];
                $p = $e[1];

                $pp[$p][] = $r;

                //$permission  =  Permission::findByName($p);
                //if(!Permission::findByName($p))
                //$permission  = Permission::create(['name' => $p]);
                //else
                //$permission  =  Permission::findByName($p);   

                //$permission = Permission::where('name',$p)->get();    
                //if(!count($permission))
                // Permission::create(['name' => $p]);
                //$role = Role::findByName($r);
                //$permission->assignRole($role);
                //$role->givePermissionTo($permission);
            }
            foreach ($pp as $key => $vv) {
                $permission = Permission::findOrCreate($key);
                foreach ($vv as $w) {
                    $permission->assignRole($w);
                }
            }
        }

        //get roles Permisions
        $roles = Role::with('permissions')->get();
        return  $roles;
        $rp = [];
        session()->flash('notif',__('General.modified_successfully'));
        return view('admin.permissions.index', ['controllers' => $controllers, 'controller' => $controller, 'roles' => Role::get(), 'actions' => $actions]);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $user = Auth::user();
        if (!$user->hasAdminAccess) {
            return redirect('/');
        } else {
            $route = Route::getRoutes()->match($request);
            $controllerAction = \explode('\\', $route->getActionName());
            $permission = \str_replace("@", "_", end($controllerAction));
            if (!$user->can($permission)) {
                return redirect('/forbidden');
            } else {
                return $next($request);
            }
            return $next($request);
        }
    }

    public function terminate($request, $response)
    {
        return $request->all();
    }
}

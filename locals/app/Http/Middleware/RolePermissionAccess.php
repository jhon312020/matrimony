<?php

namespace App\Http\Middleware;

use App;
use Closure;
use Session;
use Route;

use App\Models\RolePermission;
use Illuminate\Support\Facades\Auth;

class RolePermissionAccess
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
        if (Auth::guard('admin')->check()) {
            $role_id = Auth::guard('admin')->user()->role_id;
            if ($role_id != 1) {
                $action = Route::currentRouteAction();
                $action = substr($action, strpos($action,'@')+1, strlen($action));
                $role_permissions = Session::get('role_permission');
                if (!$role_permissions) {
                    $role_permissions = [];
                }
                if (!in_array($action,$role_permissions)) {
                    return redirect('admin/403');
                }
            }
        }
        return $next($request);
    }
}

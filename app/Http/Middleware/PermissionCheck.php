<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;
use Illuminate\Http\Request;

class PermissionCheck
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param Closure $next
     * @param $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {

        if(optional($request->user())->hasRole($role)){
            return $next($request);
        }else {
            abort(403, 'not authenticated');
        }

    }

    private function isAdmin($user){
        return $user->role_id == Role::$ADMIN_ID;
    }

    private function isManager($user){
        return $user->role_id == Role::$MANAGER_ID;
    }
}

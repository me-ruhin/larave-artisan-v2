<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Log;
class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permissionName): Response
    {
      
        $role = $request->user()->role; 
        $hasPermission = in_array($permissionName,$role->permission);
        if(!$hasPermission){
            // abort(403,"You do not have permission");
            return response(['message'=>"You donot have permission"]);
        }
        return $next($request);
    }
}

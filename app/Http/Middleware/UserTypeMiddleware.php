<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;
use Auth;

class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $user_type)
    {
        if(Auth::user() && Auth::user()->user_type == $user_type ) {
            return $next($request);
        }

        return response()->json(["msg"=> $user_type . " = " . Auth::user()->user_type . " && " . Auth::check() . " You don't have  permission to access this page"]);

    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnAdminUserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {//        if ($request->user()->id == $request->user->id || Auth::user()->status == 'admin') {
        if (Auth::user() == $request->user || Auth::user()->status == 'admin')  {
            return $next($request);
        }else{
            abort(403);
        }
    }
}

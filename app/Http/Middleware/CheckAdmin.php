<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdmin
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
        $auth_user = auth()->user();;
        $have_permission = ['admin'];
        if (!in_array($auth_user->role, $have_permission)) {
            return back();
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserKasir
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
        $permission = array("Kasir", "Supervisor", "Super Admin", "Kepala Cabang");
        if (!in_array(Auth::user()->level_user, $permission)) {
            return redirect('/');
        }
        return $next($request);
    }
}

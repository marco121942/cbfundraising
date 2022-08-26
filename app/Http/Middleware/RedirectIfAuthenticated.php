<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RedirectIfAuthenticated
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                
                if ($request->user()->hasRole('admin') or $request->user()->hasRole('org')) {
                    if ($request->session()->has('redirect_to')) {
                        return redirect(session('redirect_to'));
                    }else{
                        return redirect(RouteServiceProvider::HOME);
                    }
                } else if ($request->user()->hasRole('donate')) {
                    if ($request->session()->has('redirect_to')) {
                        return redirect(session('redirect_to'));
                    }else{
                        return redirect('/');
                        //return dd($request);
                    }
                }
            }
        }
        // return redirect('/logout');
        // return route('logout');
        return $next($request);
    }
}

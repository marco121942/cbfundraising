<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Models\Donation;

class Dashboard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->hasRole('org')) {
            if ($request->session()->has('redirect_to')) {
                return redirect(session('redirect_to'));
            }else{
                return $next($request);
                // return redirect('/dashboard');
            }
        } else if ($request->user()->hasRole('admin')) {
            if ($request->session()->has('redirect_to')) {
                return redirect(session('redirect_to'));
            }else{
                return redirect('/admin/dashboard');
            }
        } else {
            if ($request->session()->has('redirect_to')) {
                return redirect(session('redirect_to'));
            }else{
                // return abort(403);
                return redirect('/');
            }
        }
    }
}

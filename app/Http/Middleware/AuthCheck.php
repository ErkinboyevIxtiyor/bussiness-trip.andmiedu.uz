<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
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
        if (!session()->has('LoggedUser') && ($request->path() !='dashboard/login')) {
            return redirect('/dashboard/login');
        }
        if (session()->has('LoggedUser') && ($request->path() == 'dashboard/login') ) {
            return back();
        }
        return $next($request)->header('Cache-Control', 'no-cache,no-store,max-age=0, mast-revalidate')
                              ->header('Progma','no-cache')
                              ->header('Expires','Sat 01 Jan 1990 00:00:00 GMT');
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class IsBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            if (Auth::user()->status === 'inactive') {
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerate();
                return redirect(route('login'))->with('status','account-banned');
            }
        }

        return $next($request);
    }
}

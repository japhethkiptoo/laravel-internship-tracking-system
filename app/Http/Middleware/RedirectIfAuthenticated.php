<?php

namespace Entern\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //if (Auth::guard($guard)->check()) {
            //return redirect('/home');
        //}
        switch ($guard) {
            case 'sup':
                if (Auth::guard($guard)->check()) {
                        return redirect()->route('sup.dashboard');
                    }
                break;
            
            case 'lec':
                if (Auth::guard($guard)->check()) {
                        return redirect()->route('lec.dashboard');
                    }
                break;

            case 'web':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('home');
                }
                break;
        }

        return $next($request);
    }
}

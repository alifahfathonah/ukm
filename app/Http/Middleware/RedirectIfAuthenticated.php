<?php

namespace App\Http\Middleware;

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
        switch ($guard) {
            case 'admin':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('admin.home');
                }
                break;
            case 'bahasa':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('bahasa.home');
                }
                break;
                
            case 'dcfc':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('dcfc.home');
                }
                break;
            
            case 'psdj':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('psdj.home');
                }
                break;
            
            case 'musik':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('musik.home');
                }
                break;

            case 'bem':
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('bem.home');
                }
                break;
            
            default:
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('home');
                }
                break;
        }

        return $next($request);
    }
}

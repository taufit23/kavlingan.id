<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role != 0) {
            if (Auth::user()->status == null) {
                return redirect()->to('profile');
            } elseif (Auth::user()->status != null) {
                return redirect()->route('home.index');
            }
        }
        return $next($request);
    }
}
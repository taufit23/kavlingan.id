<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (in_array($request->user()->role, $roles)) {
            dd(auth()->user()->status);
            if (auth()->user()->status == null) {
                return redirect()->to('profile');
            }
            return $next($request);
        }
        return redirect('/');
        // return $next($request);
    }
}
<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class CekStatus
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
        $user = User::where('email', $request->email)->first();
        if ($user->status == 'admin') {
            return redirect('admin/dashboard');
        } elseif ($user->status == 'mahasiswa') {
            return redirect('mahasiswa/dashboard');
        }

        return $next($request);;
    }
}
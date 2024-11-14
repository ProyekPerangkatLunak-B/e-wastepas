<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (Auth::check()) {
            $user = Auth::user();
            Log::info('User Role:', [
                'email' => $user->email,
                'role' => $user->peran->nama_peran ?? 'no role',
            ]);

            if ($user->peran && $user->peran->nama_peran === $role) {
                return $next($request);
            }
        }

        return redirect('/home')->with('error', 'Anda tidak memiliki akses.');
    }
}
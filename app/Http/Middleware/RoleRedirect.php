<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            if ($user->id_peran == '1') {
                return redirect('/admin/datamaster/masyarakat');
            } elseif ($user->id_peran == '2') {
                return redirect('/kurir/dashboard');
            } elseif ($user->id_peran == '4') {
                return redirect()->route('manajemen.datamaster.dashboard.index');
            }
        }

        return $next($request);
    }
}

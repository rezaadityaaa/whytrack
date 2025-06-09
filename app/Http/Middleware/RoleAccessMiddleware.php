<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user) {
            abort(403, 'Unauthorized');
        }

        // Jika pakai Spatie Permission:
        if ($user->role == 'admin') {
            return $next($request);
        }

        if ($user->role == 'staff') {
            $allowedRoutes = [
                'bahan-baku',
                'pengeluaran',
                'penjualan',
                'penggunaan-bahan-baku',
                'pergerakan-stok',
            ];

            $currentRoute = $request->route()->getName(); // e.g. 'bahan-baku.index'

            foreach ($allowedRoutes as $routePrefix) {
                if (str_starts_with($currentRoute, $routePrefix)) {
                    return $next($request);
                }
            }

            abort(403, 'Akses ditolak untuk staff.');
        }

        abort(403, 'Unauthorized');
    }
}

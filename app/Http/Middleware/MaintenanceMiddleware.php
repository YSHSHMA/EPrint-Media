<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MaintenanceMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $config = configData();

        if (is_object($config) && isset($config->maintenance_mode) && (int) $config->maintenance_mode === 1) {
            return redirect(url('maintenance-mode'));
        }

        return $next($request);
    }
}

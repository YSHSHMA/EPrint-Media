<?php

namespace App\Http\Middleware;

use App\Models\Front\Visitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Http;

class TrackVisitorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        if ($ip != '127.0.0.1' && $ip != '::1') {
            $ipData = getIpData($ip);
            Visitor::create([
                'ip_address' => $ipData['ip'],
                'country'    => $ipData['country'],
                'state'      => $ipData['state'],
                'city'       => $ipData['city'],
                'url'       => url()->current(),
            ]);
        }

        return $next($request);
    }
}

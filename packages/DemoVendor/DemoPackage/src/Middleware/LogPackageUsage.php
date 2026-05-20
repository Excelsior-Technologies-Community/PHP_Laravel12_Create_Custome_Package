<?php

namespace DemoVendor\DemoPackage\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use DemoVendor\DemoPackage\Models\PackageLog;

class LogPackageUsage
{
    public function handle(Request $request, Closure $next): Response
    {
        if (config('demopackage.logging_enabled', true)) {
            PackageLog::create([
                'url' => $request->fullUrl(),
                'ip_address' => $request->ip(),
                'visited_at' => now(),
            ]);
        }

        return $next($request);
    }
}
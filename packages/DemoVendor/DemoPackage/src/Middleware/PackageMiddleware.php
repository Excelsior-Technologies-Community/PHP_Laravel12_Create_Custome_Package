<?php

namespace DemoVendor\DemoPackage\Middleware;

use Closure;
use Illuminate\Http\Request;

class PackageMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Log package access
        \Log::info('DemoPackage accessed', [
            'ip' => $request->ip(),
            'url' => $request->fullUrl(),
            'time' => now()
        ]);

        // Apply session-based theme
        if (session()->has('demopackage_theme')) {
            config(['demopackage.theme' => session('demopackage_theme')]);
        }

        return $next($request);
    }
}
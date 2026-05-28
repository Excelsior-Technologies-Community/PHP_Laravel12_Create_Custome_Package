<?php

namespace DemoVendor\DemoPackage\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DemoController extends Controller
{
    public function index()
    {
        $data = [
            'page_title' => 'Demo Package Home',
            'message' => config('demopackage.message'),
            'theme' => config('demopackage.theme'),
        ];
        
        return view('demopackage::index', $data);
    }

    public function info()
    {
        $packageInfo = [
            'name' => 'DemoPackage',
            'version' => demoVersion(),
            'author' => 'DemoVendor',
            'laravel_version' => app()->version(),
            'php_version' => phpversion(),
            'server_time' => now()->toDateTimeString(),
        ];

        return response()->json($packageInfo);
    }

    public function showConfig()
    {
        $config = [
            'message' => config('demopackage.message'),
            'theme' => config('demopackage.theme'),
            'font_size' => config('demopackage.font_size'),
            'show_footer' => config('demopackage.show_footer'),
            'footer_text' => config('demopackage.footer_text'),
            'features' => config('demopackage.features'),
        ];

        return view('demopackage::config', compact('config'));
    }

    public function updateTheme(Request $request)
    {
        $theme = $request->input('theme', 'light');
        
        // Update config dynamically (for session only)
        session(['demopackage_theme' => $theme]);
        
        return response()->json([
            'success' => true,
            'theme' => $theme,
            'message' => 'Theme updated successfully!'
        ]);
    }
}
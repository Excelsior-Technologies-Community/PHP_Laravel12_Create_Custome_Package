<?php

use Illuminate\Support\Facades\Route;
use DemoVendor\DemoPackage\Controllers\DemoController;
use App\Http\Controllers\DemoPackageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/app-demo-package', [DemoPackageController::class, 'index']);
Route::get('/demo', [DemoController::class, 'index']);
Route::get('/demo-view', function () {
    return view('demopackage::index');
});
Route::get('/demo-config', [DemoController::class, 'showConfig']);
Route::get('/demo-info', [DemoController::class, 'info']);

// Apply middleware to group
Route::middleware(['demo.package'])->group(function () {
    Route::get('/demo-protected', [DemoController::class, 'index']);
});
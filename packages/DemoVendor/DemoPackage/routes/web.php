<?php

use DemoVendor\DemoPackage\Controllers\DemoController;

Route::get('/demo-package', [DemoController::class, 'index']);
Route::get('/demo-package/info', [DemoController::class, 'info']);
Route::get('/demo-package/config', [DemoController::class, 'showConfig']);
Route::post('/demo-package/update-theme', [DemoController::class, 'updateTheme']);
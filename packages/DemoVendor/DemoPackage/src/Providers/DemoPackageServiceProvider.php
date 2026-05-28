<?php

namespace DemoVendor\DemoPackage\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class DemoPackageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Load routes
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');

        // Load views
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'demopackage');

        // Publish config and views
        $this->publishes([
            __DIR__.'/../../config/demopackage.php' => config_path('demopackage.php'),
            __DIR__.'/../../resources/views' => resource_path('views/vendor/demopackage'),
        ], 'demopackage');

        // Register Blade directive
        Blade::directive('demoVersion', function () {
            return "<?php echo demoVersion(); ?>";
        });

        Blade::directive('demoDate', function () {
            return "<?php echo demoDate(); ?>";
        });
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/demopackage.php',
            'demopackage'
        );
    }
}
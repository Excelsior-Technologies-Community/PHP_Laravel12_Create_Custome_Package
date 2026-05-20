<?php

namespace DemoVendor\DemoPackage\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use DemoVendor\DemoPackage\Commands\InstallPackage;

class DemoPackageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../config/demopackage.php', 'demopackage'
        );
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'demopackage');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallPackage::class,
            ]);

            $this->publishes([
                __DIR__ . '/../../config/demopackage.php' => config_path('demopackage.php'),
            ], 'demopackage-config');

            $this->publishes([
                __DIR__ . '/../../public' => public_path('vendor/demopackage'),
            ], 'demopackage-assets');
        }

        Blade::directive('demoVersion', function () {
            return "<?php echo 'DemoPackage v1.0.0'; ?>";
        });
    }
}
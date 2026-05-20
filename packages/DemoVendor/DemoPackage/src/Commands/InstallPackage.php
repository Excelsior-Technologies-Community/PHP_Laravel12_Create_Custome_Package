<?php

namespace DemoVendor\DemoPackage\Commands;

use Illuminate\Console\Command;

class InstallPackage extends Command
{
    protected $signature = 'demopackage:install';
    protected $description = 'Install and initialize the Demo Package';

    public function handle()
    {
        $this->info('Initializing Demo Package Setup...');

        $this->call('vendor:publish', [
            '--provider' => "DemoVendor\DemoPackage\Providers\DemoPackageServiceProvider",
            '--tag' => "demopackage-config"
        ]);
        
        $this->call('vendor:publish', [
            '--provider' => "DemoVendor\DemoPackage\Providers\DemoPackageServiceProvider",
            '--tag' => "demopackage-assets"
        ]);

        $this->info('Demo Package installed successfully! Run "php artisan migrate" to create tables.');
    }
}
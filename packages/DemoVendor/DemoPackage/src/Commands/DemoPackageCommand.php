<?php

namespace DemoVendor\DemoPackage\Commands;

use Illuminate\Console\Command;

class DemoPackageCommand extends Command
{
    protected $signature = 'demo:info {--detail : Show detailed information}';
    protected $description = 'Display DemoPackage information';

    public function handle()
    {
        $this->info('=== DemoPackage Information ===');
        $this->line('Package Name: DemoPackage');
        $this->line('Version: ' . demoVersion());
        
        if ($this->option('detail')) {
            $this->newLine();
            $this->info('Configuration:');
            $this->line('  Message: ' . config('demopackage.message'));
            $this->line('  Theme: ' . config('demopackage.theme'));
            $this->line('  Font Size: ' . config('demopackage.font_size'));
        }
        
        return Command::SUCCESS;
    }
}
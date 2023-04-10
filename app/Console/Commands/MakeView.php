<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeView extends Command
{
    protected $signature = 'make:view {name}';

    protected $description = 'Create a new view';

    public function handle()
    {
        $name = $this->argument('name');
        $path = resource_path('views/' . str_replace('.', '/', $name) . '.blade.php');
        $dir = dirname($path);

        if (! File::exists($dir)) {
            File::makeDirectory($dir, 0755, true);
        }

        File::put($path, '');
        $this->info($name . ' created successfully.');
    }
}

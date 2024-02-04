<?php

namespace Fancode\LaravelGenerateViews\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateViewCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:view {name : The name of the view folder or file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a Blade view folder or file in resources/views (without the .blade.php extension)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = resource_path('views/' . $name);

        // Check if the path already exists
        if (File::exists($path)) {
            $this->error('Folder or file already exists!');
            return;
        }

        // Determine if the provided name is a directory or a file
        if (is_dir($path)) {
            // Create nested directories if a path is provided
            File::makeDirectory($path, 0755, true, true);
            $this->info('View folder created successfully.');
        } else {
            // Check if the file blade with the same name already exists
            if (File::exists($path . '.blade.php')) {
                $this->error('Blade view file with the same name already exists!');
                return;
            }
            // Create a Blade file
            $directory = dirname($path);

            // Check if the parent directory exists
            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0755, true, true);
            }

            // Check if the path ends with .blade.php, if not, append it
            if (!str_ends_with($path, '.blade.php')) {
                $path .= '.blade.php';
            }

            File::put($path, '');
            $this->info('Blade view file created successfully.');
        }
    }
}

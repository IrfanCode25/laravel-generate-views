<?php

namespace Fancode\LaravelGenerateViews;

use Illuminate\Support\ServiceProvider;

class GenerateViewServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->commands([
            Console\Commands\GenerateViewCommand::class,
        ]);
    }

    public function boot()
    {
    }
}

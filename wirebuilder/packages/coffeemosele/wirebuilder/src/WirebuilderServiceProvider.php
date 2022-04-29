<?php

namespace Coffeemosele\Wirebuilder;

use Illuminate\Support\ServiceProvider;

class WirebuilderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/wirebuilder.php', 'wirebuilder');

        $this->commands([
            Console\InstallCommand::class,
        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

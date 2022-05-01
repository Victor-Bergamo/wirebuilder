<?php

namespace Coffeemosele\Wirebuilder;

use Illuminate\Support\ServiceProvider;

class WirebuilderServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    protected $commands = [
        Console\InstallCommand::class,
        Console\CreateCommand::class,
    ];

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // $this->mergeConfigFrom(__DIR__ . '/../config/wirebuilder.php', 'wirebuilder');

        $this->commands($this->commands);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
        }
    }

    protected function registerPublishing()
    {
        $this->publishes([
            __DIR__ . '/../config/wirebuilder.php' => config_path('wirebuilder.php'),
        ], 'wirebuilder-config');
    }
}

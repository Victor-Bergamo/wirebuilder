<?php

namespace Coffeemosele\Wirebuilder;

use Coffeemosele\Wirebuilder\Facades\Wirebuilder;
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
        $this->commands($this->commands);
        $this->registerFacades();
        $this->registerFields();
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

    protected function registerFacades()
    {
        $this->app->singleton('Wirebuilder', function ($app) {
            return new \Coffeemosele\Wirebuilder\Wirebuilder();
        });
    }

    protected function registerFields()
    {
        Wirebuilder::fields([
            'button' => Components\Form\Field\Button::class,
            'text' => Components\Form\Field\Text::class,
            'email' => Components\Form\Field\Email::class,
            'password' => Components\Form\Field\Password::class,
            'select' => Components\Form\Field\Select::class,
        ]);
    }
}

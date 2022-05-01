<?php

namespace App\Providers;

use Coffeemosele\Wirebuilder\Facades\Wirebuilder;
use Illuminate\Support\ServiceProvider;

class WirebuilderServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Wirebuilder::fields($this->registerFields());
    }

    public function register()
    {
        //
    }

    public function registerFields()
    {
        return [
            //
        ];
    }
}

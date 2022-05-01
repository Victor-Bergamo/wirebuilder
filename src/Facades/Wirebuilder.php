<?php

namespace Coffeemosele\Wirebuilder\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Wirebuilder.
 *
 * @method static \Coffeemosele\Wirebuilder\Crafter crafter()
 *
 * @see \Coffeemosele\Wirebuilder\Wirebuilder
 */

class Wirebuilder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Coffeemosele\Wirebuilder\Wirebuilder::class;
    }
}

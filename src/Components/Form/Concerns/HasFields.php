<?php

namespace Coffeemosele\Wirebuilder\Components\Form\Concerns;

use Illuminate\Support\Arr;
use Coffeemosele\Wirebuilder\Components\Form\Field;

/**
 * @method Field\Text           text($column, $label = '')
 * @method Field\Password       password($column, $label = '')
 * @method Field\Email          email($column, $label = '') 
 * @method Field\Select         select($column, $label = '') 
 */

trait HasFields
{
    public static $availableFields = [
        'button' => Field\Button::class,
        'text' => Field\Text::class,
        'email' => Field\Email::class,
        'password' => Field\Password::class,
        'select' => Field\Select::class,
    ];

    /**
     * Form field alias.
     *
     * @var array
     */
    public static $fieldAlias = [];

    /**
     * Find field class.
     *
     * @param string $method
     *
     * @return bool|mixed
     */
    public static function findFieldClass($method)
    {
        // If alias exists.
        if (isset(static::$fieldAlias[$method])) {
            $method = static::$fieldAlias[$method];
        }

        $class = Arr::get(static::$availableFields, $method);

        if (class_exists($class)) {
            return $class;
        }

        return false;
    }
}

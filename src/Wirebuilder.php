<?php

namespace Coffeemosele\Wirebuilder;

class Wirebuilder
{
    /** @var array */
    protected $fields = [];

    /**
     * Wirebuilder version.
     *
     * @var string
     */
    const VERSION = '1.0.0';

    /**
     * Check if Wirebuilder config file has been published and set.
     *
     * @return bool
     */
    public static function configNotPublished()
    {
        return is_null(config('wirebuilder'));
    }

    /**
     * Append fields.
     *
     * @param array $fields
     * @return void
     */
    public function fields(array $fields)
    {
        $this->fields = array_merge($this->fields, $fields);
    }

    /**
     * Get available fields.
     *
     * @return array
     */
    public function availableFields()
    {
        return $this->fields;
    }
}

<?php

namespace Coffeemosele\Wirebuilder;

use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Coffeemosele\Wirebuilder\Components\Form;
use Coffeemosele\Wirebuilder\Components\Footer;

class Crafter
{
    public $fields;

    public $form;

    public $footer;

    /** @var array */
    protected $options = [];

    public function __construct(Form $form)
    {
        $this->form = $form;
        $this->fields = new Collection();
        $this->footer = new Footer();
    }

    /**
     * Call component
     * 
     * @param Component
     */
    public static function render($component)
    {
        return $component->render();
        // return call_user_func($callback);
    }

    public function footer()
    {
        return $this->footer->render();
    }

    /**
     * Add or get options.
     *
     * @param array $options
     *
     * @return array|null
     */
    public function options($options = [])
    {
        if (empty($options)) {
            return $this->options;
        }

        $this->options = array_merge($this->options, $options);
    }

    /**
     * Get or set option.
     *
     * @param string $option
     * @param mixed  $value
     *
     * @return $this
     */
    public function option($option, $value = null)
    {
        if (func_num_args() === 1) {
            return Arr::get($this->options, $option);
        }

        $this->options[$option] = $value;

        return $this;
    }

    /**
     * Return all fields
     */
    public function fields()
    {
        return $this->fields;
    }

    /**
     * Craft fields
     * 
     * @param Component
     */
    public function addField(Component $field)
    {
        $this->fields->push($field);
    }
}

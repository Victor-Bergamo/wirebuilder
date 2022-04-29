<?php

namespace Coffeemosele\Wirebuilder\Components\Form\Field;

use Livewire\Component;
use Illuminate\Contracts\Support\Arrayable;
use Coffeemosele\Wirebuilder\Components\Form\Field;

class Select extends Field
{
    public function render()
    {
        $this->addVariables([
            'options' => $this->options
        ]);

        return view('livewire.components.form.field.select', $this->variables());
    }

    /**
     * Set options.
     *
     * @param array|callable|string $options
     *
     * @return $this|mixed
     */
    public function options($options = [])
    {
        // remote options
        if (is_string($options)) {
            // reload selected
            if (class_exists($options) && in_array(Model::class, class_parents($options))) {
                return $this->model(...func_get_args());
            }

            return $this->loadRemoteOptions(...func_get_args());
        }

        if ($options instanceof Arrayable) {
            $options = $options->toArray();
        }

        if (is_callable($options)) {
            $this->options = $options;
        } else {
            $this->options = (array) $options;
        }

        return $this;
    }
}

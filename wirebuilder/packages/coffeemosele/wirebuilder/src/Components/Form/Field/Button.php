<?php

namespace Coffeemosele\Wirebuilder\Components\Form\Field;

use Coffeemosele\Wirebuilder\Components\Form\Field;
use Livewire\Component;

class Button extends Field
{
    public function render()
    {
        return view('livewire.components.form.field.button', $this->variables());
    }
}

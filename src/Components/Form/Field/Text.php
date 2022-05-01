<?php

namespace Coffeemosele\Wirebuilder\Components\Form\Field;

use Coffeemosele\Wirebuilder\Components\Form\Field;
use Livewire\Component;

class Text extends Field
{
    public function render()
    {
        return view('livewire.components.form.field.text', $this->variables());
    }
}

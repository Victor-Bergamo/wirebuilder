<?php

namespace Coffeemosele\Wirebuilder\Components\Form\Field;

use Coffeemosele\Wirebuilder\Components\Form\Field;
use Livewire\Component;

class Email extends Field
{
    public function render()
    {
        return view('livewire.components.form.field.email', $this->variables());
    }
}

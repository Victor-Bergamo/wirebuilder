<?php

namespace Coffeemosele\Wirebuilder\Components;

use Livewire\Component;
use Coffeemosele\Wirebuilder\Components\Form\Concerns\HasFields;

class Footer extends Component
{
    use HasFields;

    /**
     * Available buttons.
     *
     * @var array
     */
    public $buttons = ['reset', 'submit'];

    public function __construct()
    {
    }

    public function render()
    {
        return view('livewire.components.footer', ['buttons' => $this->buttons]);
    }
}

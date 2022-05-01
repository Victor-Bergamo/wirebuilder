<?php

namespace Coffeemosele\Wirebuilder\Components;

use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;
use Coffeemosele\Wirebuilder\Facades\Crafter;
use Coffeemosele\Wirebuilder\Components\Form\Field;
use Coffeemosele\Wirebuilder\Components\Form\Builder;
use Coffeemosele\Wirebuilder\Components\Form\Layout\Layout;
use Coffeemosele\Wirebuilder\Components\Form\Concerns\HasFields;
use Coffeemosele\Wirebuilder\Components\Form\Field\Button;

class Form extends Component
{
    use HasFields;

    /** @var Crafter */
    protected $crafter;

    /** @var Layout */
    protected $layout;

    /** @var Builder */
    protected $builder;

    /** @var mixed */
    public $formClass;

    public function __construct()
    {
        $this->initCrafter();
    }

    public function render()
    {
        // $this->builder = new Builder($this);

        return view('livewire.components.form', ['crafter' => $this->crafter, 'form' => $this]);
    }

    /**
     * Initialize filter layout.
     */
    protected function initCrafter()
    {
        $this->crafter = new Crafter($this);
    }

    /**
     * @param Field $field
     *
     * @return $this
     */
    public function pushField($field): self
    {
        $this->crafter->addField($field);

        return $this;
    }

    public function mount()
    {
        //
    }

    public function open($options = []): string
    {
        $attributes = [];

        $attributes['action'] = $this->getAction();
        $attributes['method'] = Arr::get($options, 'method', 'post');
        $attributes['class'] = implode(' ', [$this->formClass]);
        $attributes['accept-charset'] = 'UTF-8';

        $html = [];
        foreach ($attributes as $name => $value) {
            $html[] = "$name=\"$value\"";
        }

        return '<form ' . implode(' ', $html) . '>';
    }

    public function footer()
    {
        return $this->crafter->footer();
    }

    public function close(): string
    {
        $this->fields = null;

        return '</form>';
    }

    public function __call($method, $arguments)
    {
        if ($className = static::findFieldClass($method)) {
            $column = Arr::get($arguments, 0, ''); //[0];

            $element = new $className($column, array_slice($arguments, 1));

            $this->pushField($element);

            return $element;
        }
    }

    /**
     * @return Crafter
     */
    public function getCrafter(): Crafter
    {
        return $this->crafter;
    }
}

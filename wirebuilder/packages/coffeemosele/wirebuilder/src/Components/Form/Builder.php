<?php

namespace Coffeemosele\Wirebuilder\Components\Form;

use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Coffeemosele\Wirebuilder\Components\Form;

class Builder
{
    /**
     * @var mixed
     */
    public $idBuilder;

    /**
     * @var Form
     */
    public $form;

    /**
     * @var mixed
     */
    public $action;

    /**
     * @var Collection
     */
    public $fields;

    /**
     * @var array
     */
    public $options = [];

    /**
     * Form action mode, could be create|view|edit.
     *
     * @var string
     */
    public $mode = 'create';

    /**
     * @var array
     */
    public $hiddenFields = [];

    /**
     * Form title.
     *
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $formClass;

    public function __construct(Form $form)
    {
        $this->form = $form;

        $this->fields = new Collection();

        $this->init();
    }

    public function render()
    {
        return view('livewire.components.form.builder', ['form' => $this->form]);
    }

    public function build()
    {
        dump('build');
    }

    public function field()
    {
        dump('field');
    }

    public function mount()
    {
    }

    public function init()
    {
        $this->formClass = "";
    }

    public function getAction()
    {
        return $this->action;
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

    public function close(): string
    {
        $this->form = null;
        $this->fields = null;

        return '</form>';
    }
}

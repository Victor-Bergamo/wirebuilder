<?php

namespace Coffeemosele\Wirebuilder\Components\Form;

use Livewire\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Coffeemosele\Wirebuilder\Components\Form;
use Illuminate\Contracts\Support\Arrayable;

class Field extends Component
{
    /**
     * Element id.
     *
     * @var array|string
     */
    public $idField;

    /**
     * Element value.
     *
     * @var mixed
     */
    public $value;

    /**
     * Data of all original columns of value.
     *
     * @var mixed
     */
    public $data;

    /**
     * Field original value.
     *
     * @var mixed
     */
    public $original;

    /**
     * Field default value.
     *
     * @var mixed
     */
    public $default;

    /**
     * Element label.
     *
     * @var string
     */
    public $label = '';

    /**
     * Column name.
     *
     * @var string|array
     */
    public $column = '';

    /**
     * Form element name.
     *
     * @var string
     */
    public $elementName = [];

    /**
     * Form element classes.
     *
     * @var array
     */
    public $elementClass = [];

    /**
     * Variables of elements.
     *
     * @var array
     */
    public $variables = [];

    /**
     * Options for specify elements.
     *
     * @var array
     */
    public $options = [];

    /**
     * Checked for specify elements.
     *
     * @var array
     */
    public $checked = [];

    /**
     * Validation rules.
     *
     * @var array|\Closure
     */
    public $rules = [];

    /**
     * The validation rules for creation.
     *
     * @var array|\Closure
     */
    public $creationRules = [];

    /**
     * The validation rules for updates.
     *
     * @var array|\Closure
     */
    public $updateRules = [];

    /**
     * @var \Closure
     */
    public $validator;

    /**
     * Validation messages.
     *
     * @var array
     */
    public $validationMessages = [];

    /**
     * Css required by this field.
     *
     * @var array
     */
    public static $css = [];

    /**
     * Js required by this field.
     *
     * @var array
     */
    public static $js = [];

    /**
     * Script for field.
     *
     * @var string
     */
    public $script = '';

    /**
     * Element attributes.
     *
     * @var array
     */
    public $attributes = [];

    /**
     * Parent form.
     *
     * @var Form|WidgetForm
     */
    public $form = null;

    /**
     * View for field to render.
     *
     * @var string
     */
    public $view = '';

    /**
     * Help block.
     *
     * @var array
     */
    public $help = [];

    /**
     * Key for errors.
     *
     * @var mixed
     */
    public $errorKey;

    /**
     * Placeholder for this field.
     *
     * @var string|array
     */
    public $placeholder;

    public function render()
    {
        // return view('livewire.components.form.field');
    }

    /**
     * Field constructor.
     *
     * @param       $column
     * @param array $arguments
     */
    public function __construct($column = '', $arguments = [])
    {
        $this->column = $this->formatColumn($column);
        $this->label = $this->formatLabel($arguments);
        $this->idField = $this->formatId($column);
    }

    public function mount()
    {
        //
    }

    /**
     * Set the field options.
     *
     * @param array $options
     *
     * @return $this
     */
    public function options($options = [])
    {
        if ($options instanceof Arrayable) {
            $options = $options->toArray();
        }

        $this->options = array_merge($this->options, $options);

        return $this;
    }

    public function formatColumn($column = '')
    {
        if (Str::contains($column, '->')) {
            $this->isJsonType = true;

            $column = str_replace('->', '.', $column);
        }

        return $column;
    }

    /**
     * Format the field element id.
     *
     * @param string|array $column
     *
     * @return string|array
     */
    protected function formatId($column)
    {
        return str_replace('.', '_', $column);
    }

    /**
     * Format the label value.
     *
     * @param array $arguments
     *
     * @return string
     */
    protected function formatLabel($arguments = []): string
    {
        $column = is_array($this->column) ? current($this->column) : $this->column;

        $label = $arguments[0] ?? ucfirst($column);

        return str_replace(['.', '_', '->'], ' ', $label);
    }


    /**
     * Format the name of the field.
     *
     * @param string $column
     *
     * @return array|mixed|string
     */
    protected function formatName($column)
    {
        if (is_string($this->column)) {
            if (Str::contains($this->column, '->')) {
                $name = explode('->', $this->column);
            } else {
                $name = explode('.', $this->column);
            }

            if (count($name) === 1) {
                return $name[0];
            }

            $html = array_shift($name);
            foreach ($name as $piece) {
                $html .= "[$piece]";
            }

            return $html;
        }

        if (is_array($this->column)) {
            $names = [];
            foreach ($this->column as $key => $name) {
                $names[$key] = $this->formatName($name);
            }

            return $names;
        }

        return '';
    }

    /**
     * @param Form $form
     *
     * @return $this
     */
    public function setForm(Form $form = null)
    {
        $this->form = $form;

        return $this;
    }

    /**
     * Get the view variables of this field.
     *
     * @return array
     */
    public function variables(): array
    {
        return array_merge($this->variables, [
            'idField'     => $this->idField,
            'name'        => $this->elementName ?: $this->formatName($this->column),
            'help'        => $this->help,
            'class'       => $this->getElementClassString(),
            'value'       => $this->value,
            'label'       => $this->label,
            'column'      => $this->column,
            'placeholder' => $this->getPlaceholder(),
        ]);
    }

    /**
     * Add variables to field view.
     *
     * @param array $variables
     *
     * @return $this
     */
    public function addVariables(array $variables = []): self
    {
        $this->variables = array_merge($this->variables, $variables);

        return $this;
    }

    /**
     * Get element class.
     *
     * @return array
     */
    public function getElementClass(): array
    {
        if (!$this->elementClass) {
            $name = $this->elementName ?: $this->formatName($this->column);

            $this->elementClass = (array) str_replace(['[', ']'], '_', $name);
        }

        return $this->elementClass;
    }

    /**
     * Get element class string.
     *
     * @return mixed
     */
    public function getElementClassString()
    {
        $elementClass = $this->getElementClass();

        if (Arr::isAssoc($elementClass)) {
            $classes = [];

            foreach ($elementClass as $index => $class) {
                $classes[$index] = is_array($class) ? implode(' ', $class) : $class;
            }

            return $classes;
        }

        return implode(' ', $elementClass);
    }

    /**
     * Set field placeholder.
     *
     * @param string $placeholder
     *
     * @return $this
     */
    public function placeholder($placeholder = ''): self
    {
        $this->placeholder = $placeholder;

        return $this;
    }

    /**
     * Get placeholder.
     *
     * @return mixed
     */
    public function getPlaceholder()
    {
        return $this->placeholder ?: 'Entrada ' . $this->label;
    }
}

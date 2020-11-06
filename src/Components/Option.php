<?php

namespace ConfrariaWeb\Option\Components;

use Illuminate\View\Component;

class Option extends Component
{

    public $name;
    public $type;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $type = NULL, $value = NULL)
    {
        $this->type = $type ?? 'text';
        $this->name = 'options[' . $this->type . '][' . $name . ']';
        $this->value = $value ?? NULL;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('option::components.forms.' . $this->type);
    }
}

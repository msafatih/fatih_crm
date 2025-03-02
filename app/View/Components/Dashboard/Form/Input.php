<?php
p
namespace App\View\Components\Dashboard\Form;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Input extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $label;
    public $type;
    public $placeholder;
    public $icon;
    public $required;
    public $value;
    public $min;
    public $max;

    public function __construct(
        $name,
        $label = null,
        $type = 'text',
        $placeholder = null,
        $icon = null,
        $required = false,
        $value = null,
        $min = null,
        $max = null
    ) {
        $this->name = $name;
        $this->label = $label ?? ucfirst(str_replace('_', ' ', $name));
        $this->type = $type;
        $this->placeholder = $placeholder ?? 'Masukkan ' . strtolower($this->label);
        $this->icon = $icon;
        $this->required = $required;
        $this->value = $value;
        $this->min = $min;
        $this->max = $max;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.form.input');
    }
}

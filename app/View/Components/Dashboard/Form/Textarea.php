<?php
p
namespace App\View\Components\Dashboard\Form;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Textarea extends Component
{
    /**
     * Create a new component instance.
     */
    public $name;
    public $label;
    public $placeholder;
    public $icon;
    public $required;
    public $value;
    public $rows;

    public function __construct(
        $name,
        $label = null,
        $placeholder = null,
        $icon = null,
        $required = false,
        $value = null,
        $rows = 4
    ) {
        $this->name = $name;
        $this->label = $label ?? ucfirst(str_replace('_', ' ', $name));
        $this->placeholder = $placeholder ?? 'Masukkan ' . strtolower($this->label);
        $this->icon = $icon;
        $this->required = $required;
        $this->value = $value;
        $this->rows = $rows;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.form.textarea');
    }
}

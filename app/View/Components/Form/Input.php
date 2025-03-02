<?php
p
namespace App\View\Components\Form;

use Illuminate\View\Component;

class Input extends Component
{
    public $type;
    public $name;
    public $id;
    public $label;
    public $icon;
    public $placeholder;
    public $value;

    public function __construct(
        $type = 'text',
        $name,
        $id,
        $label,
        $icon,
        $placeholder = '',
        $value = ''
    ) {
        $this->type = $type;
        $this->name = $name;
        $this->id = $id;
        $this->label = $label;
        $this->icon = $icon;
        $this->placeholder = $placeholder;
        $this->value = $value;
    }

    public function render()
    {
        return view('components.form.input');
    }
}

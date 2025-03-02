<?php

namespace App\View\Components\Form;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class SubmitButton extends Component
{

    public $text;
    public $icon;
    /**
     * Create a new component instance.
     */
    public function __construct(
        $text = 'Submit',
        $icon = 'check'
    ) {
        $this->text = $text;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form.submit-button');
    }
}

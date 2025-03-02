<?php
p
namespace App\View\Components\Dashboard\Form;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Row extends Component
{
    /**
     * Create a new component instance.
     */
    public $cols;

    public function __construct($cols = 2)
    {
        $this->cols = $cols;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.form.row');
    }
}

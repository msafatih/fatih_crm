<?php
p
namespace App\View\Components\Dashboard\Form;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Select extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.form.select');
    }
}

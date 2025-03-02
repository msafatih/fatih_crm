<?php
p
namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Table extends Component
{
    public $hasActions;

    /**
     * Create a new component instance.
     */
    public function __construct($hasActions = true)
    {
        $this->hasActions = $hasActions;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.table');
    }
}

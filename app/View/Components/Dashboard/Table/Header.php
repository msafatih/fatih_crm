<?php

namespace App\View\Components\Dashboard\Table;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Header extends Component
{
    public $columns;

    /**
     * Create a new component instance.
     */
    public function __construct(array $columns)
    {
        //
        $this->columns = $columns;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.table.header');
    }
}

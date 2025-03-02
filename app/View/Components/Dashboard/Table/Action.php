<?php
p
namespace App\View\Components\Dashboard\Table;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Action extends Component
{
    /**
     * Create a new component instance.
     */
    public $item;
    public $route;
    public $actions;

    public function __construct($item, $route, array $actions = ['view', 'edit', 'delete'])
    {
        $this->item = $item;
        $this->route = $route;
        $this->actions = $actions;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.table.action');
    }
}

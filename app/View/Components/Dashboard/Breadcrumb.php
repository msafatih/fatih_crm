<?php

namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Breadcrumb extends Component
{
    public $items;

    /**
     * Create a new component instance.
     */
    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public static function generateUrl($item)
    {
        if (!isset($item['route'])) {
            return '';
        }

        return route($item['route'], $item['params'] ?? []);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.breadcrumb');
    }
}

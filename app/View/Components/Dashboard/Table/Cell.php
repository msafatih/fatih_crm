<?php
p
namespace App\View\Components\Dashboard\Table;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Cell extends Component
{
    public function __construct(
        public string $type = 'primary',
        public ?string $align = null,
        public ?string $class = null
    ) {}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.table.cell');
    }
}

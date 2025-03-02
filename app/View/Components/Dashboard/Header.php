<?php
p
namespace App\View\Components\Dashboard;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Header extends Component
{
    /**
     * Create a new component instance.
     */
    public $title;
    public $subtitle;
    public $icon;
    public $buttonLabel;
    public $buttonRoute;
    public $buttonIcon;
    public $buttonAction;

    public function __construct(
        string $title,
        string $subtitle = '',
        string $icon = '',
        string $buttonLabel = '',
        string $buttonRoute = '',
        string $buttonIcon = '',
        string $buttonAction = ''
    ) {
        $this->title = $title;
        $this->subtitle = $subtitle;
        $this->icon = $icon;
        $this->buttonLabel = $buttonLabel;
        $this->buttonRoute = $buttonRoute;
        $this->buttonIcon = $buttonIcon;
        $this->buttonAction = $buttonAction;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.header');
    }
}

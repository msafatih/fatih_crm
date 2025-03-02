<?php
p
namespace App\View\Components\Sidebar;

use Illuminate\View\Component;

class NavigationItem extends Component
{
    public $route;
    public $icon;
    public $label;
    public $roles;

    public function __construct($route, $icon, $label, array $roles = [])
    {
        $this->route = $route;
        $this->icon = $icon;
        $this->label = $label;
        $this->roles = $roles;
    }

    public function render()
    {
        return view('components.sidebar.navigation-item');
    }
}

<?php
p
namespace App\View\Components\Sidebar;

use Closure;
use Illuminate\View\Component;
use Illuminate\Support\Facades\View;

class Logout extends Component
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
    public function render()
    {
        return view('components.sidebar.logout');
    }
}

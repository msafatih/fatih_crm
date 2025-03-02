<?php
p
namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class AuthHeader extends Component
{
    /**
     * Create a new component instance.
     */
    public $icon;
    public $title;
    public $subtitle;

    public function __construct($icon = 'user-circle', $title = 'Welcome Back!', $subtitle = 'Access your PT SMART dashboard')
    {
        $this->icon = $icon;
        $this->title = $title;
        $this->subtitle = $subtitle;
    }

    public function render()
    {
        return view('components.auth-header');
    }
}

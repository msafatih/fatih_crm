<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class AuthLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $title = 'Login'
    ) {
        //

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.auth');
    }
}

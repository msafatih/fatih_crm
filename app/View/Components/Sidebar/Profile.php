<?php

namespace App\View\Components\Sidebar;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Profile extends Component
{
    public $name;
    public $role;
    public $image;
    public $initials;

    public function __construct()
    {
        $this->name = Auth::user()->name;
        $this->role = Auth::user()->role ?? 'Sales';
        $this->image = Auth::user()->image;
        $this->initials = $this->generateInitials($this->name);
    }

    protected function generateInitials($name)
    {
        return collect(explode(' ', $name))
            ->map(function ($segment) {
                return strtoupper(substr($segment, 0, 1));
            })
            ->take(2)
            ->join('');
    }

    public function render()
    {
        return view('components.sidebar.profile');
    }
}

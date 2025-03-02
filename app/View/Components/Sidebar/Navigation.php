<?php

namespace App\View\Components\Sidebar;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;

class Navigation extends Component
{
    public $items;
    public $userRole;

    public function __construct()
    {
        $this->userRole = Auth::user()->role;
        $this->items = $this->getNavigationItems();
    }

    protected function getNavigationItems()
    {
        return [
            new NavigationItem(
                'dashboard',
                'fas fa-home',
                'Dashboard',
                ['admin', 'manager', 'sales']
            ),
            new NavigationItem(
                'leads.index',
                'fas fa-users',
                'Lead Management',
                ['admin', 'sales']
            ),
            new NavigationItem(
                'projects.index',
                'fas fa-tasks',
                'Project Management',
                ['manager']
            ),
            new NavigationItem(
                'products.index',
                'fas fa-box',
                'Products',
                ['admin', 'manager']
            ),
            new NavigationItem(
                'customers.index',
                'fas fa-user-check', // Changed to user-check for confirmed customers
                'Customers',
                ['admin', 'sales', 'manager']
            ),
        ];
    }

    public function render()
    {
        return view('components.sidebar.navigation');
    }
}

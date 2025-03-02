<?php

namespace App\View\Components\Dashboard\Table;

use Illuminate\View\Component;

class StatusBadge extends Component
{
    public $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    public function getColorClass()
    {
        return match (strtolower($this->status)) {
            'new' => 'bg-green-100 text-green-800',
            'contacted' => 'bg-blue-100 text-blue-800',
            'qualified' => 'bg-purple-100 text-purple-800',
            default => 'bg-gray-100 text-gray-800',
        };
    }

    public function render()
    {
        return view('components.dashboard.table.status-badge');
    }
}

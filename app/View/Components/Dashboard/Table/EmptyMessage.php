<?php

namespace App\View\Components\Dashboard\Table;

use Illuminate\View\Component;

class EmptyMessage extends Component
{
    public $columns;
    public $hasActions;
    public $message;
    public $icon;
    public $description;

    public function __construct(
        array $columns,
        $hasActions = true,
        $message = 'No data available',
        $icon = 'folder-open',
        $description = 'Try adjusting your search or filter to find what you\'re looking for.'
    ) {
        $this->columns = $columns;
        $this->hasActions = $hasActions;
        $this->message = $message;
        $this->icon = $icon;
        $this->description = $description;
    }

    public function render()
    {
        return view('components.dashboard.table.empty-message');
    }
}

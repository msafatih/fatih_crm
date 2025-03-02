<?php

namespace App\View\Components\Dashboard\Form;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Actions extends Component
{
    /**
     * Create a new component instance.
     */
    public $backRoute;
    public $backLabel;
    public $submitLabel;

    public function __construct($backRoute, $backLabel = 'Kembali', $submitLabel = 'Simpan')
    {
        $this->backRoute = $backRoute;
        $this->backLabel = $backLabel;
        $this->submitLabel = $submitLabel;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.form.actions');
    }
}

<?php
p
namespace App\View\Components\Dashboard\Form;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Container extends Component
{
    public $action;
    public $method;
    /**
     * Create a new component instance.
     */
    public function __construct($action, $method = 'POST')
    {
        $this->action = $action;
        $this->method = $method;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dashboard.form.container');
    }
}

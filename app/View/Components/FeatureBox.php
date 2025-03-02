<?php
p
namespace App\View\Components;

use Illuminate\View\Component;

class FeatureBox extends Component
{
    public $icon;
    public $title;
    public $description;
    public $id;

    public function __construct($icon, $title, $description, $id)
    {
        $this->icon = $icon;
        $this->title = $title;
        $this->description = $description;
        $this->id = $id;
    }

    public function render()
    {
        return view('components.feature-box');
    }
}

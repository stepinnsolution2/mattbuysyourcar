<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CldImage extends Component
{

    public $publicId;
    public $alt;
    public $title;
    /**
     * Create a new component instance.
     */
    public function __construct($publicId, $alt = '', $title = '')
    {
        $this->publicId = $publicId;
        $this->alt = $alt;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cld-image');
    }
}

<?php

namespace App\View\Components;

use App\Models\About;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AboutSection extends Component
{
    public $about;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->about = About::first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.about-section');
    }
}

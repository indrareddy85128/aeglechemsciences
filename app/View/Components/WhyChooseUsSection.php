<?php

namespace App\View\Components;

use App\Models\WhyChooseUs;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WhyChooseUsSection extends Component
{
    public $whychooseus;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->whychooseus = WhyChooseUs::first();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.why-choose-us-section');
    }
}

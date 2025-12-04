<?php

namespace App\View\Components;

use App\Models\MissionVisionValue as ModelsMissionVisionValue;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MissionVisionValue extends Component
{
    public $missionvisionvalues;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->missionvisionvalues =  ModelsMissionVisionValue::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.mission-vision-value');
    }
}

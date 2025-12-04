<?php

namespace App\View\Components;

use App\Models\Cart;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class CartCount extends Component
{

    public $count;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->count = Auth::check() ? Cart::where('user_id', Auth::id())->count() : 0;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cart-count');
    }
}

<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HomeListCategory extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $args = [
            ['status', '=', 1],
            ['parent_id', '=', 0],
        ];
        $categorys = Category::where($args)->orderBy('sort_order', 'DESC')->get();
        return view('components.home-list-category', compact('categorys'));
    }
}

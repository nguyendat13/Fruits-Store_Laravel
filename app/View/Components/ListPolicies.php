<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ListPolicies extends Component
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
        // $args = [
        //     ['status', '=', 1],
        //     ['position', '=', 'footer'],
        //     ['parent_id', '=', 0]
        // ];
        // $menus = Menu::where($args)
        //     ->orderBy('sort_order', 'DESC')
        //     ->get();
        return view('frontend.policies.list-policies');
    }
}

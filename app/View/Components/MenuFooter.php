<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuFooter extends Component
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
            ['position', '=', 'footermenu'],
            ['parent_id', '=', 0],
        ];
        $list_menu = Menu::where($args)->orderBy('sort_order', 'DESC')->get();

        // Debug dữ liệu
        if ($list_menu->isEmpty()) {
            dd("No menus found with args: ", $args);
        }

        return view('components.menu-footer', compact('list_menu'));
    }
}

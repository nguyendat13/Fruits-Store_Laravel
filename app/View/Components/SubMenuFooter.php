<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SubMenuFooter extends Component
{
    public $row_menu = null;
    /**
     * Create a new component instance.
     */
    public function __construct($rowmenu)
    {
        $this->row_menu = $rowmenu;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menu = $this->row_menu;
        $args_footermenu_sub = [
            ['status', '=', 1],
            ['position', '=', 'footermenu'],
            ['parent_id', '=', $menu->id]
        ];
        $list_menu_sub = Menu::where($args_footermenu_sub)
            ->orderBy('sort_order', 'DESC')
            ->get();
        return view('components.sub-menu-footer', compact('menu', 'list_menu_sub'));
    }
}

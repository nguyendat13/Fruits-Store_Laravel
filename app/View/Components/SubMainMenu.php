<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SubMainMenu extends Component
{
    public $menu_item;
    /**
     * Create a new component instance.
     */
    public function __construct($menuitem)
    {
        $this->menu_item = $menuitem;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $menu = $this->menu_item;
        $args = [
            ['status', '=', 1],
            ['position', '=', 'mainmenu'],
            ['parent_id', '=', $menu->id],
        ];
        $menus = Menu::where($args)->orderBy('sort_order', 'DESC')->get();
        return view('components.sub-main-menu', compact('menus', 'menu'));
    }
}

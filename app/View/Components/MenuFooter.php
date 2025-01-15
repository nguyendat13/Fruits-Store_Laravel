<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuFooter extends Component
{
    public $menus;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->menus = Menu::where('position', 'footermenu')
            ->where('parent_id', 0)
            ->orderBy('sort_order')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.menu-footer', ['menus' => $this->menus]);
    }
}

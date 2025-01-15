<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SubMenuFooter extends Component
{
    public $subMenus;
    /**
     * Create a new component instance.
     */
    public function __construct($rowmenu)
    {
        $this->subMenus = Menu::where('parent_id', $rowmenu)
            ->orderBy('sort_order')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        return view('components.sub-menu-footer', ['subMenus' => $this->subMenus]);
    }
}

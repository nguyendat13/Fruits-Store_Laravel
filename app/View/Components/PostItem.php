<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PostItem extends Component
{
    public $postitem = null;
    public function __construct($postitem)
    {
        $this->postitem = $postitem;
    }

    public function render(): View|Closure|string
    {
        $post = $this->postitem;
        return view('components.post-item', compact('post'));
    }
}

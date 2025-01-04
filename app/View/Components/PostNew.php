<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Blade;
use App\Models\Post;

class PostNew extends Component
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
        $post_list = Post::where([['status', 1], ['type', '=', 'post']])
            ->orderBy('created_at', 'desc')
            ->limit(2)
            ->get();
        return view('components.post-new', compact('post_list'));
    }
}

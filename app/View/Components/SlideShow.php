<?php

namespace App\View\Components;

use App\Models\Banner;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SlideShow extends Component
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
        // Lấy các banner có position là slideshow và status = 1
        $slideshowBanners = Banner::where('position', 'slideshow')->where('status', 1)->get();

        // Lấy các banner có position là banner và status = 1
        $bannerBanners = Banner::where('position', 'banner')->where('status', 1)->get();

        return view('components.slide-show', compact('slideshowBanners', 'bannerBanners'));
    }
}

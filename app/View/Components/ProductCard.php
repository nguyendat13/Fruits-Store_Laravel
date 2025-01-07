<?php

namespace App\View\Components;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProductCard extends Component
{
    public $product_item;
    public $is_new;

    /**
     * Create a new component instance.
     */
    public function __construct($productitem, $isNew = false)
    {
        $this->product_item = $productitem;
        $this->is_new = $isNew;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|string
    {


        return view('components.product-card');
    }
}

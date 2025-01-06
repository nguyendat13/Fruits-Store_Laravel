<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Product;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HomeProductCategory extends Component
{
    public $category_item;
    public $selected_category;

    /**
     * Create a new component instance.
     */
    public function __construct($categoryitem, $selectedCategory = null)
    {
        $this->category_item = $categoryitem;
        $this->selected_category = $selectedCategory;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $list_catid = [];
        $category = $this->category_item;
        $args1 = [
            ['status', '=', 1],
            ['parent_id', '=', $category->id],
        ];
        array_push($list_catid, $category->id);
        $categorys1 = Category::select("id", "parent_id", "status")
            ->where($args1)->get();
        if ($categorys1 != null) {
            foreach ($categorys1 as $category1) {
                array_push($list_catid, $category1->id);
                $args2 = [
                    ['status', '=', 1],
                    ['parent_id', '=', $category1->id],
                ];
                $categorys2 = Category::select("id", "parent_id", "status")
                    ->where($args2)->get();
                if ($categorys2 != null) {
                    foreach ($categorys2 as $category2) {
                        array_push($list_catid, $category2->id);
                    }
                }
            }
        }


        //print_r($list_catid);
        $products = Product::where('status', '=', 1)
            ->whereIn('category_id', $list_catid)
            ->orderBy('created_at', 'DESC')
            ->limit(4)
            ->get();
        return view('components.home-product-category', compact('products'));
    }
}

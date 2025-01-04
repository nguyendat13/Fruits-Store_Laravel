<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();

        $categoryProducts = $categories->map(function ($category) {
            $listCatIds = $this->getCategoryTree($category->id);
            return [
                'category' => $category,
                'products' => Product::where('status', 1)
                    ->whereIn('category_id', $listCatIds)
                    ->orderBy('created_at', 'DESC')
                    ->limit(4)
                    ->get(),
            ];
        });

        // Trả về view
        return view('frontend.home', compact('categoryProducts'));
    }

    private function getCategoryTree($categoryId)
    {
        $listCatIds = [$categoryId];
        $childCategories = Category::where('parent_id', $categoryId)
            ->where('status', 1)
            ->get();

        foreach ($childCategories as $child) {
            $listCatIds = array_merge($listCatIds, $this->getCategoryTree($child->id));
        }

        return $listCatIds;
    }
}

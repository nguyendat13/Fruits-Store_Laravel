<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $table = "category";

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}

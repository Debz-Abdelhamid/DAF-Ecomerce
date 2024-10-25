<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'icon',
        'slug',
        'status'
    ];



    public function subcategories(): HasMany
    {
        return $this->hasMany(Subcategory::class, 'category_id', 'id');
    }

    public function childCategories(): HasMany
    {
        return $this->hasMany(ChildCategory::class, 'category_id', 'id');
    }

    public function productscategory(): HasMany
    {
        return $this->hasMany(Product::class, 'category_id', 'id');

    }
}

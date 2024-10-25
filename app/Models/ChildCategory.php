<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ChildCategory extends Model
{
    use HasFactory;



    protected $fillable = [

        'category_id',
        'subcategory_id',
        'name',
        'slug',
        'status'
    ];


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    // Define the relationship with SubCategory
    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }
}

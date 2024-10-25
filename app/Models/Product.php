<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use \Carbon\Carbon;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'subcategory_id',
        'childcategory_id',
        'brand_id',
        'name',
        'price_12',
        'price_24',
        'price_36',
        'price_48',
        'price_60',
        'slug',
        'thumb_image',
        'qty',
        'short_description',
        'long_description',
        'video_link',
        'price',
        'offer_price',
        'offer_start_date',
        'offer_end_date',
        'type',
        'is_approved',
        'status',
     
    ];

    
    protected $casts = [
        'offer_start_date' => 'date',
        'offer_end_date' => 'date',

    ];
    

    public function galleries(): HasMany
    {
        return $this->hasMany(Productgallery::class, 'product_id', 'id');
    }

    public function variants(): HasMany
    {
        return $this->hasMany(ProductVariant::class, 'product_id', 'id');
    }

    public function brand(): BelongsTo
    {
         return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function category(): BelongsTo
    {
         return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory(): BelongsTo
    {
         return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }

    public function childcategory(): BelongsTo
    {
         return $this->belongsTo(ChildCategory::class, 'childcategory_id', 'id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(OrderProduct::class,'product_id','id');
    }
}

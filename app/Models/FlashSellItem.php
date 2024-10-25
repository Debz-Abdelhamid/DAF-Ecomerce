<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FlashSellItem extends Model
{
    use HasFactory;

    protected $fillable= [
        'flash_sell_id',
        'product_id',
        'show_at_home',
        'status'
    ];

    public function productitem(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}

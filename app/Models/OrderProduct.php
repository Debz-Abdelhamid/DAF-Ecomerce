<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'product_id',
        'vendor_id',
        'unit_price',
        'qty',
    ];
    

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }

    
}

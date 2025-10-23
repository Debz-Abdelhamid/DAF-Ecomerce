<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'inovice_id',
        'subtotal',
        'amount',
        'currency_name',
        'currency_icon',
        'product_qty',
        'payment_method',
        'payment_status',
        'order_address',
        'dossier',
        'shipping_method',
        'coupon',
        'order_status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function orderProducts(): HasMany
    {
        return $this->hasMany(OrderProduct::class,'order_id','id');
    }

    
    
    
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashSell extends Model
{
    use HasFactory;

    protected $fillable = [
        'sale_end_date'
    ];

    protected $casts = [
        'sale_end_date' => 'date'
    ];
}

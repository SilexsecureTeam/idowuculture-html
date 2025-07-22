<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'session_id',
        'user_id',
        'product_id',
        'Fabric_id',
        'selected_fabric',
        'color',
        'size',
        'buy_fabric',
        'checked_out',
        'quantity',
        'total'
    ];

    protected $casts = [
        'selected_fabric' => 'array',
        'buy_fabric' => 'boolean',
        'checked_out' => 'boolean',
    ];

    protected $with = ['user', 'product'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}

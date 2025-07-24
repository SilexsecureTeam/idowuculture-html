<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
    protected $fillable = [
        'discount_name',
        'description',
        'percentage',
        'is_active',
    ];

    protected static function booted()
    {
        static::saving(function ($discount) {
            if ($discount->is_active) {
                static::where('id', '!=', $discount->id)->update(['is_active' => false]);
            }
        });
    }
}

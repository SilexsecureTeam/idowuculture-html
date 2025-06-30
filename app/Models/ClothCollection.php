<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClothCollection extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'position'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'sku',
        'title',
        'slug',
        'price',
        'colors',
        'sizes',
        'description',
        'images',
        'has_fabric',
        'fabric_price',
        'stock',
        'is_featured',
        'cloth_collection_id'
    ];
    protected $with = [
        'category'
    ];
    
    protected $casts = [
        'colors' => 'array',
        'sizes' => 'array',
        'images' => 'array',
        'has_fabric' => 'boolean',
        'is_featured' => 'boolean',
        'price' => 'decimal:2',
        
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cloth_collection()
    {
        return $this->belongsTo(ClothCollection::class);
    }
    
   
}

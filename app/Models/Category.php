<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'image',
        'parent_id'
    ];

    public function parent_category(){
        return $this->hasOne(Category::class, 'parent_id');
    }
    public function sub_categories(){
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function products(){
        return $this->hasMany(Product::class);
    }
}

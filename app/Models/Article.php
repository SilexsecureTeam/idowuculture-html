<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'images',
        'heading',
        'content'
    ];

    protected $casts = [
        'images'=> 'array',
    ];
}

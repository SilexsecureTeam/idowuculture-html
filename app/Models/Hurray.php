<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hurray extends Model
{
    protected $fillable = [
        'hurray_image'
    ];

    protected $casts = [
        'hurray_image' => 'array',
    ];
}

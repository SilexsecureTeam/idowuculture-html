<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hurray extends Model
{
    protected $fillable = [
        'hurray-image'
    ];

    protected $casts = [
        'hurray-image' => 'array',
    ];
}

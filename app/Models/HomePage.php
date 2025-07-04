<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    protected $fillable = [
        'sliders'
    ];

    protected $casts = [
        'sliders' => 'array',
    ];
}

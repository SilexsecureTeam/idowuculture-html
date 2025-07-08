<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutPage extends Model
{
    protected $fillable = [
        'images',
        'our_story',
        'delivery',
        'statement'
    ];

    protected $casts = [
        'images' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($model) {
            // Prevent creating if record already exists
            if (static::count() > 0) {
                throw new \Exception('Only one About Page record is allowed.');
            }
        });
    }
}

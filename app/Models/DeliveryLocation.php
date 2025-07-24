<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DeliveryLocation extends Model
{
    protected $fillable = [
        'address',
        'city',
        'state',
        'country',
        'lat',
        'lng',
        'fee',
    ];
}

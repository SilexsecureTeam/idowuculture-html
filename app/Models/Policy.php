<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    protected $fillable = [
        'shipping_policy',
        'refund_policy',
        'terms_and_conditions',
        'privacy_policy',
        'policy_image',
        'terms_image'
    ];
}

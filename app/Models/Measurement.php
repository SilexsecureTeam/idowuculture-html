<?php

namespace App\Models;

use App\Enums\MeasurementStatus;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    protected $fillable = [
        'user_id',
        'measured_by',
        'neck',
        'chest',
        'waist',
        'hip',
        'shoulder',
        'sleeve_length',
        'top_length',
        'trouser_length',
        'thigh',
        'knee',
        'ankle',
        'amount',
        'status',
        'notes',
    ];

    protected $casts = [
        'neck' => 'decimal:2',
        'chest' => 'decimal:2',
        'waist' => 'decimal:2',
        'hip' => 'decimal:2',
        'shoulder' => 'decimal:2',
        'sleeve_length' => 'decimal:2',
        'top_length' => 'decimal:2',
        'trouser_length' => 'decimal:2',
        'thigh' => 'decimal:2',
        'knee' => 'decimal:2',
        'ankle' => 'decimal:2',
        'amount' => 'decimal:2',
        'status' => MeasurementStatus::class,
        
    ];

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function measuredBy()
    {
        return $this->belongsTo(User::class, 'measured_by', 'id');
    }

    
}

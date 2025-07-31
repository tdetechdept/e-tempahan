<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialHoliday extends Model
{
    protected $fillable = [
        'holiday_name',
        'start_date',
        'end_date',
        'notes',
        'created_by',
        'is_active'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}

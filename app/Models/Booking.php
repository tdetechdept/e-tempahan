<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'meeting_name',
        'chairman',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'number_of_participants',
        'description',
        'room_id',
        'type',
        'status',
        'repetition_type',
        'repeat_date',
        'room_plan',
        'secretariat_name',
        'secretariat_office_phone',
        'secretariat_mobile_phone',
        'secretariat_email',
        'food',
        'catering_name',
        'catering_phone',
        'technical_services',
        'ict_services',
        'equipment',
        'other_requirements',
        'car_number',
        'update_info',
        'reviews'
    ];

    protected $casts = [
        'equipment' => 'array',
        'food' => 'boolean',
        'technical_services' => 'boolean',
        'ict_services' => 'boolean',
        'other_requirements' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
        'start_time' => 'datetime:H:i:s',
        'end_time' => 'datetime:H:i:s',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room() {
        return $this->belongsTo(Room::class);
    }

    public function getStatusNameAttribute()
    {
        return match ($this->status) {
            1 => 'New',
            2 => 'Pending',
            3 => 'Approved',
            4 => 'Rejected',
            5 => 'Cancelled',
            default => 'Unknown',
        };
    }
}

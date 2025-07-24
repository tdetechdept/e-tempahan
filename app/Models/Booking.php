<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        // ... other fields
        'update_info',
        'reviews'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function room() {
        return $this->belongsTo(Room::class); // if you're using a Room model
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

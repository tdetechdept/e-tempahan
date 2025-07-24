<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;
    const IMAGE_PATH = 'images/rooms';
    const PLAN_PATH = 'images/plans';

    protected $fillable = [
        'room_name',
        'description',
        'room_capacity',
        'picture',
        'layout',
        'facilities',
        'status',
        'level'
    ];

    protected $casts = [
        'facilities' => 'array',
    ];
}

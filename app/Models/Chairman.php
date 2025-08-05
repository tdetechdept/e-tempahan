<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chairman extends Model
{
    protected $fillable = ['name', 'position', 'division', 'office_phone'];
}


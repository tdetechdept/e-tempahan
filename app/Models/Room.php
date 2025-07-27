<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class Room extends Model implements Auditable
{
    use HasFactory, AuditableTrait;

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

    protected $auditInclude = [
        'room_name',
        'description',
        'room_capacity',
        'facilities',
        'picture',
        'layout',
        'level',
        'status'
    ];

    protected $auditOnlyDirty = true;

    public function transformAudit(array $data): array
    {
        $data['ip_address'] = request()->ip();
        $data['user_agent'] = request()->userAgent();
        $data['url'] = request()->fullUrl();
        return $data;
    }
}
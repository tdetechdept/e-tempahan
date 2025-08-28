<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;
use Illuminate\Support\Facades\Auth;

class Booking extends Model implements Auditable
{
    use AuditableTrait;

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
        'reviews',
        'updated_field_info',
        'other_layout_plan',
        'ministry',
        'position',
        'gred',
        'office',
        'phone',
        'email',
        'notification_user',
        'notification_admin',
        'agenda_attachment',
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

    // Audit configuration
    protected $auditInclude = [
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
        'reviews',
        'updated_field_info',
        'other_layout_plan',
        'ministry',
        'position',
        'gred',
        'office',
        'phone',
        'email',
        'notification_user',
        'notification_admin',
        'agenda_attachment',
    ];

    // Only track changed attributes
    protected $auditOnlyDirty = true;

    // Events to audit
    protected $auditEvents = [
        'created',
        'updated',
        'deleted'
    ];

    // Transform audit data
    public function transformAudit(array $data): array
    {
        $data['ip_address'] = request()->ip();
        $data['user_agent'] = request()->userAgent();
        $data['url'] = request()->fullUrl();
        
        // Add user context if available
        if (auth()->check()) {
            $data['user_id'] = Auth::id();
            // $data['user_name'] = Auth::user()->name;
        }
        
        return $data;
    }

    // Generate tags for audit
    public function generateTags(): array
    {
        return [
            'booking_management',
            'status:' . $this->getStatusNameAttribute(),
            'room_id:' . $this->room_id,
            'user_id:' . $this->user_id
        ];
    }

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

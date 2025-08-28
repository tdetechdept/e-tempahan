<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Auditable as AuditableTrait;

class User extends Authenticatable implements Auditable
{
    use HasFactory, Notifiable, HasRoles, AuditableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'id_number',
        'position',
        'grade',
        'section',
        'department',
        'office_number',
        'phone_number',
        'status',
        'password',
        'image',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            do {
                $user->id_number = str_pad(random_int(100000000000, 999999999999), 12, '0', STR_PAD_LEFT);
            } while (User::where('id_number', $user->id_number)->exists());
        });
    }

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Attributes to include in audits
    protected $auditInclude = [
        'name',
        'email',
        'id_number',
        'position',
        'grade',
        'section',
        'department',
        'office_number',
        'phone_number',
        'status'
    ];
    
    // Attributes to exclude from audits
    protected $auditExclude = [
        'password',
        'remember_token',
        'email_verified_at'
    ];
    
    // Only track changed attributes
    protected $auditTimestamps = true;
    
    // Events to audit
    protected $auditEvents = [
        'created',
        'updated',
        'deleted'
    ];

    // Transform audit data to ensure proper JSON encoding
    public function transformAudit(array $data): array
    {
        // Add additional context
        $data['ip_address'] = request()->ip();
        $data['user_agent'] = request()->userAgent();
        
        // Add user context if available
        if (auth()->check()) {
            $data['user_id'] = auth()->id();
           // $data['admin_user_name'] = auth()->user()->name;
        }
        
        return $data;
    }

    // Custom method to get decoded old values
    public function getDecodedOldValues()
    {
        if (is_array($this->old_values)) {
            return $this->old_values;
        }
        
        return $this->old_values ? json_decode($this->old_values, true) : [];
    }

    // Custom method to get decoded new values
    public function getDecodedNewValues()
    {
        if (is_array($this->new_values)) {
            return $this->new_values;
        }
        
        return $this->new_values ? json_decode($this->new_values, true) : [];
    }

    // Generate tags for audit (optional)
    public function generateTags(): array
    {
        return [
            'user_management',
            'status:' . $this->status_label
        ];
    }

    // Status helper methods
    public function getStatusLabelAttribute()
    {
        $statuses = [
            0 => 'New',
            1 => 'Pending',
            2 => 'Approved', 
            3 => 'Rejected',
            4 => 'Cancelled',
            5 => 'Deactivated'
        ];
        
        return $statuses[$this->status] ?? 'Unknown';
    }

    public function isActive()
    {
        return $this->status == 2; // Approved status
    }

    public function isDeactivated()
    {
        return $this->status == 5;
    }

    public static function userUnreadNotifications($id)
    {
        $user = User::find($id);

        if($user->hasRole(['Admin', 'Super Admin'])) {
            $notify = Booking::where('notification_admin', 0)
                ->get();
            return $notify;
        }

        $notify = Booking::where('user_id', $id)
            ->where('notification_user', 0)
            ->get();

        return $notify;
    }
}
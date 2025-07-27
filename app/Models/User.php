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
        'position',
        'status'
    ];
    
    // Attributes to exclude from audits
    protected $auditExclude = [
        'password',
        'remember_token'
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
        return $data;
    }
}
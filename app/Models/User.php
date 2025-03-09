<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'is_active',
        'role',
        'user_simak',
        'details',
        'foto'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
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

    public function scoperole($query, $value)
    {
        if ($value) {
            if (!is_array($value)) {
                $query->where('role', $value);
            } else {
                $query->whereIn('role', $value);
            }
        }
    }

    public function scopeactive($query, $value)
    {
        if ($value) {
            $query->where('is_active', $value);
        }
    }

    public function spesialisasi()
    {
        return $this->belongsToMany(Service::class, 'app_counselor_has_services', 'user_id', 'service_id')->withTimestamps();
    }

    public function jadwal()
    {
        return $this->hasMany(CounselorHasSchedule::class, 'user_id', 'id');
    }
}

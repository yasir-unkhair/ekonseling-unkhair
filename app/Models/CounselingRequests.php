<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class CounselingRequests extends Model
{
    use HasUuids;

    protected $table = 'app_counseling_requests';
    protected $keyType = 'string'; // Menentukan tipe primary key sebagai string
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'counselor_id',
        'category',
        'description',
        'date',
        'time',
        'status',
        'details'
    ];

    public function scopestatus($query, array $value)
    {
        if (count($value) > 0) {
            return $query->whereIn('status', $value);
        }
    }

    public function scopecategory($query, array $value)
    {
        if (count($value) > 0) {
            return $query->whereIn('category', $value);
        }
    }

    public function scopeuser($query, $user_id)
    {
        if ($user_id) {
            return $query->where('user_id', $user_id);
        }
    }

    public function scopecounselor($query, $counselor_id)
    {
        if ($counselor_id) {
            return $query->where('counselor_id', $counselor_id);
        }
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function counselor()
    {
        return $this->hasOne(User::class, 'id', 'counselor_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class CounselorHasSchedule extends Model
{
    //
    use HasUuids;

    protected $table = 'app_counselor_has_schedules';

    public $incrementing = false;

    public $keyType = 'string';

    protected $fillable = [
        'user_id',
        'hari',
        'jam',
        'metode',
        'status',
    ];

    public function counselor()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

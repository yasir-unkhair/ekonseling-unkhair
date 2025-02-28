<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class CounselingSessions extends Model
{
    use HasUuids;

    protected $table = 'app_counseling_sessions';
    protected $keyType = 'string'; // Menentukan tipe primary key sebagai string
    public $incrementing = false;

    protected $fillable = [
        'request_id',
        'counselor_notes',
        'session_method'
    ];
}

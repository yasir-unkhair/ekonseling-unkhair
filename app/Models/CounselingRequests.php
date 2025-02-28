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
        'status'
    ];
}

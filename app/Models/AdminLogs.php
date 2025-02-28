<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class AdminLogs extends Model
{
    use HasUuids;

    protected $table = 'app_admin_logs';
    protected $keyType = 'string'; // Menentukan tipe primary key sebagai string
    public $incrementing = false;

    protected $fillable = [
        'admin_id',
        'action'
    ];
}

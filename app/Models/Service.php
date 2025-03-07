<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasUuids;

    protected $table = 'app_services';
    protected $keyType = 'string'; // Menentukan tipe primary key sebagai string
    public $incrementing = false;

    protected $fillable = [
        'name',
        'description'
    ];

    public function counselor()
    {
        return $this->belongsToMany(User::class, 'app_counselor_has_services', 'service_id', 'user_id');
    }
}

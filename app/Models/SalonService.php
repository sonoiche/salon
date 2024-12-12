<?php

namespace App\Models;

use App\Models\Service;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SalonService extends Model
{
    use HasFactory;

    protected $table = "salon_services";
    protected $guarded = [];

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'service_id');
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

}

<?php

namespace App\Models;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;

    protected $table = "appointments";
    protected $guarded = [];
    protected $appends = ['schedule','created_date','schedule_input'];

    public function getScheduleAttribute()
    {
        $appointment_date = $this->appointment_date;
        $appointment_time = $this->appointment_time;

        if($appointment_date && $appointment_time) {
            $schedule = $appointment_date . ' ' . $appointment_time;
            return Carbon::parse($schedule)->format('F d, Y h:i A');
        }

        return '';
    }

    public function getCreatedDateAttribute()
    {
        $created_at = $this->created_at;
        if($created_at) {
            return Carbon::parse($created_at)->format('F d, Y');
        }

        return '';
    }

    public function getScheduleInputAttribute()
    {
        $appointment_date = $this->appointment_date;
        $appointment_time = $this->appointment_time;

        if($appointment_date && $appointment_time) {
            $schedule = $appointment_date . ' ' . $appointment_time;
            return Carbon::parse($schedule)->format('Y-m-d h:i');
        }

        return '';
    }

    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}

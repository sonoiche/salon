<?php

namespace App\Models;

use App\Models\User;
use App\Models\Appointment;
use App\Models\SalonService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use willvincent\Rateable\Rateable;

class Client extends Model
{
    use HasFactory, Rateable;

    protected $table = "clients";
    protected $guarded = [];
    protected $appends = ['display_photo'];

    public function getDisplayPhotoAttribute()
    {
        if($this->photo) {
            return $this->photo;
        }

        return url('assets/images/teams/team-member-1.jpg');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'client_id');
    }

    public function services()
    {
        return $this->belongsToMany(SalonService::class);
    }

    public function service()
    {
        return $this->belongsTo(SalonService::class);
    }
}

<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use App\Models\Client;
use App\Models\Customer;
use App\Models\ProductOrder;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
            'password'          => 'hashed',
        ];
    }

    protected $appends = ['created_date','fullname','total_purchase'];

    public function getCreatedDateAttribute()
    {
        $created_at = $this->attributes['created_at'] ?? '';
        if($created_at) {
            return Carbon::parse($created_at)->format('d M, Y');
        }

        return '';
    }

    public function getFullnameAttribute()
    {
        $fname = $this->attributes['fname'] ?? '';
        $lname = $this->attributes['lname'] ?? '';
        if($fname && $lname) {
            return $fname . ' ' . $lname;
        }

        return '';
    }

    public function getTotalPurchaseAttribute()
    {
        return $this->orders()->sum('amount');
    }

    public function isSubscribed()
    {
        $today = now()->format('Y-m-d h:i:s');
        if($this->subscription == 1 && ($this->subscribe_until != null || $this->subscribe_until >= $today)) {
            return true;
        }

        return false;
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'user_id');
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class, 'user_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(ProductOrder::class, 'customer_id');
    }
}

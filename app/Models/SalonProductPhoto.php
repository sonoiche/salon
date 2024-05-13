<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalonProductPhoto extends Model
{
    use HasFactory;

    protected $table = "salon_product_photos";
    protected $guarded = [];
}

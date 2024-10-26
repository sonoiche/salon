<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Models\SalonProductPhoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "products";
    protected $guarded = [];
    protected $appends = ['slug_name'];

    public function getSlugNameAttribute()
    {
        $name = $this->attributes['name'] ?? '';
        if($name) {
            return Str::slug($name);
        }
    }

    public function photos()
    {
        return $this->hasMany(SalonProductPhoto::class, 'salon_product_id');
    }
}

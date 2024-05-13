<?php

namespace App\Models;

use App\Models\SalonProductPhoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "products";
    protected $guarded = [];
    protected $appends = ['feature_photo'];

    public function getFeaturePhotoAttribute()
    {
        $result = $this->photos;
        if(count($result)) {
            return url($result[0]->photo);
        }

        return url('backend/images/faces/9.jpg');
    }

    public function photos()
    {
        return $this->hasMany(SalonProductPhoto::class, 'salon_product_id');
    }
}

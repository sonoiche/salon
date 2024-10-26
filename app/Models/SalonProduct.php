<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Product;
use App\Models\SalonProductPhoto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SalonProduct extends Model
{
    use HasFactory;

    protected $table = "salon_products";
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

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function photos()
    {
        return $this->hasMany(SalonProductPhoto::class, 'salon_product_id');
    }
}

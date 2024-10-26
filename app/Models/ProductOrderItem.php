<?php

namespace App\Models;

use App\Models\Client;
use App\Models\SalonProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductOrderItem extends Model
{
    use HasFactory;

    protected $table = "product_order_items";
    protected $guarded = [];

    public function salonProduct()
    {
        return $this->belongsTo(SalonProduct::class, 'product_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}

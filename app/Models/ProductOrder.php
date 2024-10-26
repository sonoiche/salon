<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    use HasFactory;

    protected $table = "product_orders";
    protected $guarded = [];
    protected $appends = ['created_date'];

    public function getCreatedDateAttribute()
    {
        $created_at = $this->attributes['created_at'] ?? '';
        if($created_at) {
            return Carbon::parse($created_at)->format('d M, Y');
        }

        return '';
    }

    public function items()
    {
        return $this->hasMany(ProductOrderItem::class, 'order_id');
    }
}

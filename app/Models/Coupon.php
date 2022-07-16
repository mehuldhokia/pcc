<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'code', 'description', 'type', 'discount_value', 'limits',
        'min_order_value', 'max_discount_amount', 'startdate', 'enddate', 'status'
    ];

    protected $dates = ['startdate', 'enddate'];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        "vendor_id", "category_id", "brand_id", "name", "page_title", "slug",
        "cover_img", "prod_gallery", "color", "price_market", "price_selling", "price_offer",
        "attr_imgs", "attr_sku", "attr_prod_name", "attr_colors", "attr_size", "attr_qty",
        "sku", "stock_qty", "instock", "description", "about", "featured", "status"
    ];

    public function getRouteKeyName() {
    	return 'slug';
    }

    // protected static function booted() {
    //     static::saving(function ($product) {
    //         $product->product_attributes = json_encode(request('product_attributes'));
    //     });
    // }

    // public function category() {
    //     // return $this->belongsTo('App\Models\Category');
    //     return $this->belongsTo(Category::class, 'category_id');
    // }

    public function vendor() {
        return $this->belongsTo(User::class, 'vendor_id');
    }
    public function brand() {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'name', 'slug', 'image', 'status'
    ];

    // Helper Methods
    // public function getRouteKeyName() {
    // 	return 'slug';
    // }

    public function parent() {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }

    public function categories() {
        // return $this->hasMany(Category::class);
        return $this->hasMany(Category::class)->with('categories');
    }

    public function childrenCategories() {
        // return $this->hasMany(Category::class)->with('categories');
        return $this->hasMany(Category::class)->with('childrenCategories');
    }

    // public function brands() {
    //     return $this->hasMany(Brand::class, 'brand_id');
    // }

    public function brands(){
        // return $this->belongsToMany(Brand::class,'category_brand')->withTimestamps();
        return $this->belongsToMany('App\Models\Brand');
    }
    public function products() {
        return $this->hasMany('App\Models\Product');
    }
}

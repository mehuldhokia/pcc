<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'category_id', 'name', 'logo', 'description', 'status'
        'name', 'logo', 'description', 'status'
    ];

    // public function category() {
    //     return $this->belongsTo(Category::class, 'category_id');
    // }

    // public function categories() {
    //     return $this->hasMany(Category::class, 'category_id');
    // }

    public function categories() {
        return $this->belongsToMany(Category::class, 'category_brand');
    }
    public function products() {
        return $this->hasMany('App\Models\Product');
    }
}

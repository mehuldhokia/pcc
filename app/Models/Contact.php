<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname', 'email', 'phone', 'subject', 'message'
    ];

    protected $dates = ['created_at', 'updated_at'];

    protected $cast = [
        'created_at' => 'timestamp',
        'updated_at' => 'timestamp'
    ];

}

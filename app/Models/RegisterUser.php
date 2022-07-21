<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;

class RegisterUser extends Authenticatable // implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;  // HasRoles;

    protected $guard = 'student';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'qualification_id', 'user_id', 'refer_code', 'refer_by',
        'photo', 'fullname', 'email', 'email_verified_at',
        'city', 'uaddress', 'dob', 'gender',
        'phone', 'whatsappno', 'password', 'otp',
        'created_date', 'last_login_date',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['dob', 'created_date', 'last_login_date'];


    public function qualification() {
        return $this->belongsTo(Qualification::class, 'qualification_id');
    }

    // public function franchise() {
    //     return $this->hasOne(Franchise::class, 'stud_id');
    //     // return $this->belongsTo(Franchise::class, 'stud_id');
    // }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'full_name',
        'designation',
        'birth',
        'gender',
        'email',
        'phone',
        'nationality',
        'marital_status',
        'address',
        'email_verified_at',
        'password',
        'country',
        'city',
        'state',
        'post_code'
    ];



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'email_verified_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles() {
        return $this->belongsToMany(Role::class, 'user_roles','user_id');
    }

    public function reviews() {
        return $this->hasMany(Review::class, 'user_id', 'id');
    }


    public function address()
    {
        return $this->hasOne(Address::class);
    }


}

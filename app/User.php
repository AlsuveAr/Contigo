<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Authenticatable
{
    use Notifiable, EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function rooms() 
    {
        return $this->belongsToMany(Room::class);
    }
    
    public function client() 
    {
        return $this->hasOne('App\Client');
    }

    public function counselor() 
    {
        return $this->hasOne('App\Counselor');
    }

    public function histories()
    {
        return $this->belongsToMany(History::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}

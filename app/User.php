<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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
     * Get the invitations this user has sent.
     */
    public function invitations()
    {
        return $this->hasMany('App\Invitations');
    }

    /**
     * Get the invitations this user has sent.
     */
    public function invited()
    {
        return $this->hasManyThrough('App\Guests', 'App\Invitations');
    }

}

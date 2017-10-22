<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

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

    //get the festivals created by the given user
    public function festivals() {

        return $this->hasMany(Festival::class);
    }

    //create a festival by the given user
    public function publish(Festival $festival) {

        $this->festivals()->save($festival);
    }

    //check if this user is an admin
    public function isAdmin() {

        if($this->role === 1) {
            return true;
        } else {
            return false;
        }
    }
}

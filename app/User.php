<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'name', 'email', 'contact' , 'password', 'raw_password', 'school' , 'teacher' , 'teacher_phone' , 'teacher_email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {
        return $this->belongsTo('App\Role', 'role_id');
    }

    public function exam() {
        return $this->hasMany('App\Exam');
    }
    
     public function participant() {
        return $this->hasMany('App\Participant');
    }

}

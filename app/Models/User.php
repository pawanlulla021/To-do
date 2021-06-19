<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //if younhave meor fields then use thi:-
    //$protected  $guarded = [];
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    /*
    //mutator
    public function setPassWordAttribute($password){
      $this->attributes['password']= bcrypt($password);
    }

    //Accessor
    public function setNameAttribute($name){
       return 'My name is:' . ucfirst($name);
      }*/
    //One User Has Many Todos
    public function todos(){
        return $this->hasMany('App\Models\Todo');
    }  
}

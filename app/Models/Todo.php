<?php

namespace App\Models;
use App\Http\Controllers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable =['title','completed','user_id','description'];

    //one todo has many steps
    public function steps(){
        return $this->hasMany('App\Models\step');
    }  
}

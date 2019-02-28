<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bbs extends Model
{
    //controllerで使用するカラムの指定
    protected $fillable = ['name', 'comment'];
}

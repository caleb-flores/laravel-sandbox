<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    //
    protected $fillable = array('name','user_id');
}

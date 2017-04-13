<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function cars()
    {
    	return $this->hasMany('App\Cars');
    }
}

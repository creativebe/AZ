<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $fillable = ['no_plat','Type','Merk','Tahun'];

	public function customer()
	{
		return $this->belongsTo('App\Customer');
	}
}

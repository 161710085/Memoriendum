<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenis_mou extends Model
{ 
	protected $table = 'jenis_mous';
    protected $fillable = ['nama'];
    public $timestamps = true;

    public function mou()
    {
        return $this->hasMany('App\mou','mou_id');
    }
}

}

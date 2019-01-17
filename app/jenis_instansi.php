<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class jenis_instansi extends Model
{
      protected $table = 'jenis_instansis';
    protected $fillable = ['name'];
    public $timestamps = true;

    public function instansi()
    {
        return $this->hasMany('App\instansi','jenis_instansi_id');
    }
}
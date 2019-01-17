<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class instansi extends Model
{
   protected $table ='instansis';
    protected $fillable = ['namainstansi','jenis_instansi_id',
    'alamat','kota','provinsi','kodepos','namapimpinan','jabatan','nope','email','web','fax','status'];
    public $timestamps=true;
    public function jenis_instansi()
    {
        return $this->belongsTo('App\jenis_instansi','jenis_instansi_id');
    }
   
}

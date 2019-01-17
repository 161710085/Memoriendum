<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mou extends Model
{
   protected $table = 'mous';
    protected $fillable = ['instansi_id','jenis_mou_id','moulevel','pjk','nopjk','pji','nopji','pejabatpenandatangan','mulai','berakhir','manfaat','kerjasama'];
    public $timestamps = true;

 public function jenis_mou()
    {
        return $this->belongsTo('App\jenis_mous','jenis_mou_id');
    }
   
}
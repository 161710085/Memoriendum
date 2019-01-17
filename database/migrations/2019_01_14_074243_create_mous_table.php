<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mous', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('instansi_id');
            $table->foreign('instansi_id')->references('id')->on('instansis')->onUpdate('cascade')->onDelete('cascade');    
            $table->unsignedInteger('jenis_mou_id');
            $table->foreign('jenis_mou_id')->references('id')->on('jenis_mous')->onUpdate('cascade')->onDelete('cascade');   
            $table->string('moulevel');
            $table->string('pjk');
            $table->string('nopjk');
            $table->string('pji');
            $table->string('nopji');
            $table->string('pejabatpenandatangan');
            $table->date('mulai');
            $table->date('berakhir');
            $table->string('manfaat');
            $table->string('kerjasama'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mous');
    }
}

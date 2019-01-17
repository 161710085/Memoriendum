<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstansisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instansis', function (Blueprint $table) {
            $table->increments('id');
            $table->string('namainstansi');
            $table->unsignedInteger('jenis_instansi_id');
            $table->foreign('jenis_instansi_id')->references('id')->on('jenis_instansis')->onUpdate('cascade')->onDelete('cascade');      
            $table->string('alamat');
            $table->string('kota');
            $table->string('provinsi');
            $table->string('kodepos');
            $table->string('namapimpinan');
            $table->string('jabatan');
            $table->string('nope');
            $table->string('email');
            $table->string('web');
            $table->string('fax');
            $table->boolean('status');
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
        Schema::dropIfExists('instansis');
    }
}

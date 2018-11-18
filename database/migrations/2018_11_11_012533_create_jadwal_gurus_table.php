<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('jadwal_guru', function (Blueprint $table) {
    $table->increments('id');
    $table->time('jam_mulai');
    $table->time('jam_berakhir');
    $table->enum('hari',['senin','selasa','rabu','kamis','jumat']);
    $table->integer('bidang_studi_id');
    $table->integer('guru_id');
    $table->integer('kelas_id');
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
        Schema::dropIfExists('jadwal_guru');
        Schema::table('jadwal_guru',function(Blueprint $table){
            $table->dropForeign(['bidang_studi_id']);
            $table->dropForeign(['guru_id']);
            $table->dropForeign(['kelas_id']);
        });
    }

}

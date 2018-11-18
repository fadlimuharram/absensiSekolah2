<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidangStudisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('bidang_studi', function (Blueprint $table) {
          $table->increments('id');
          $table->string('deskripsi',50);
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
        Schema::dropIfExists('bidang_studi');
        Schema::table('bidang_studi',function(Blueprint $table){
            $table->dropForeign(['user_id']);
        });
    }
}

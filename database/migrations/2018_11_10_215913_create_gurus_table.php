<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('guru', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nik', 20)->unique();
          $table->string('nama',50);
          $table->string('email');
          $table->string('tlpn',20);
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
        Schema::dropIfExists('guru');
        Schema::table('guru',function(Blueprint $table){
            $table->dropForeign(['user_id']);
        });
    }
}

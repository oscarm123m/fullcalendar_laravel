<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Citas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Citas',function(Blueprint $table){
            $table->increments('idcitas');
            $table->date('start');
            $table->time('end');

            $table->integer('idmascotas')->unsigned();
            $table->foreign('idmascotas')->references('idmascotas')->on('Mascotas');

            $table->rememberToken();
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
        Schema::drop('Citas');
    }
}

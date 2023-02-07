<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Mascotas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Mascotas',function(Blueprint $table){
            $table->increments('idmascotas');
            $table->string('nombre',40);
            $table->string('identificador',40);
            $table->string('tipo',40);

            $table->integer('idclientes')->unsigned();
            $table->foreign('idclientes')->references('idclientes')->on('Clientes');

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
        Schema::drop('Mascotas');
    }
}

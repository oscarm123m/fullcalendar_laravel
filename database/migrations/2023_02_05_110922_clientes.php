<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Clientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Clientes',function(Blueprint $table){
            $table->increments('idclientes');
            $table->string('nombre',40);
            $table->string('apellido',40);
            $table->string('documento',40);
            $table->string('celular',15);
            $table->string('email',40);

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
        Schema::drop('Clientes');
    }
}

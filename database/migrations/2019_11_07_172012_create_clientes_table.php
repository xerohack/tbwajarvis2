<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id_cliente');
            $table->string('nombrecliente');
            $table->string('apellidocliente');
            $table->string('emailcliente');
            $table->string('telefonocliente');
            $table->string('areacliente');
            $table->string('nombreempresa');
            $table->string('rutempresa');
            $table->string('giroempresa');
            $table->string('direccionempresa');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}

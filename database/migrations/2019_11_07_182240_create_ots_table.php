<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtsTable extends Migration
{
    public function up()
    {
        Schema::create('ots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('cliente_id');
            $table->string('tema');
            $table->string('campana');
            $table->enum('departamento', ['creacion','produccion','audiovisual','planificacion','cuentas'])->nullable();
            $table->string('ejecutivores');
            $table->datetime('fechaentrega');
            $table->enum('tipotrabajo',['original','boceto','modificaciones'])->nullable();
            $table->string('notificarcorreo')->nullable();
            $table->string('url')->nullable();
            $table->string('file_archivo')->nullable();
            $table->longText('comentariot')->nullable();
            $table->boolean('facturable')->default(1);
            $table->string('total')->nullable();
            $table->string('estado')->nullable();
            $table->boolean('condicion')->default(1);
            $table->timestamps();

            //Relation
            //$table->foreign('cliente_id')->references('id_cliente')->on('clientes');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ots');
    }
}

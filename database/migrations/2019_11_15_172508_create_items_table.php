<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ot_id');
            $table->string('nombreitem');
            $table->string('cantidaditem');
            $table->string('valoritem');
            $table->longText('detalleitem');
            $table->timestamps();

            //Relation
            //$table->foreign('ot_id')->references('id_ot')->on('ots');

        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}

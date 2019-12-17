<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('ot_id');
            $table->string('nombreitem');
            $table->string('cantidaditem')->nullable();
            $table->string('valoritem')->nullable();
            $table->longText('detalleitem')->nullable();
            $table->longText('comentarioitem')->nullable();
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

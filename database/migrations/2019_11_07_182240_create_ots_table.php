<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tema');
            $table->string('campana');
            $table->string('departamento');
            $table->string('ejecutivores');
            $table->datetime('fechaentrega');
            $table->string('tipotrabajo');
            $table->string('notificarcorreo');
            $table->string('url');
            $table->string('file_archivo');
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
        Schema::dropIfExists('ots');
    }
}

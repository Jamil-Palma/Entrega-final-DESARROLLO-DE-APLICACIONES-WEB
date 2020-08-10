<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObservacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observacion', function (Blueprint $table) {
            $table->bigIncrements('id_obs');
            $table->string('asunto', 50);
            $table->string('origen', 20);
            $table->string('destino', 20);
            $table->timestamp('fecha_envio');
            $table->string('detalle', 200);
            $table->unsignedBigInteger('id_informe');
            $table->foreign('id_informe')->references('id_informe')->on('informe');
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
        Schema::dropIfExists('observacions');
    }
}

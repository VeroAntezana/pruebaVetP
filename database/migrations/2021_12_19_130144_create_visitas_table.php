<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitas', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->string('detalle');
            $table->date('fecha');
            $table->time('hora');

            $table->unsignedBigInteger('user_id')->nullable()->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->unsignedBigInteger('tratamiento_id')->nullable()->foreign('tratamiento_id')->references('id')->on('tratamientos')->onDelete('set null');

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
        Schema::dropIfExists('visitas');
    }
}

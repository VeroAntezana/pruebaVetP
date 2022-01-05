<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitaservicioproductoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitaservicioproducto', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad');

            $table->unsignedBigInteger('producto_id')->nullable()->foreign('producto_id')->references('id')->on('productos')->onDelete('cascade');
            $table->unsignedBigInteger('servicio_id')->nullable()->foreign('servicio_id')->references('servicio_id')->on('visitaservicioproducto')->onDelete('cascade');
            $table->unsignedBigInteger('visita_id')->nullable()->foreign('visita_id')->references('visita_id')->on('visitaservicioproducto')->onDelete('cascade');

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
        Schema::dropIfExists('visitaservicioproducto');
    }
}

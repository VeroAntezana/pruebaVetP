p<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMascotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('color');
            $table->string('sexo');
            $table->date('fnacimiento');
            $table->string('imagen');

            $table->unsignedBigInteger('raza_id')->nullable()->foreign('raza_id')->references('id')->on('razas')->onDelete('set null');
            $table->unsignedBigInteger('user_id')->nullable()->foreign('user_id')->references('id')->on('users')->onDelete('set null');


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
        Schema::dropIfExists('mascotas');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersProyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_proyectos', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_userid');
            $table->foreign('fk_userid')->references('id')->on('users');
            $table->unsignedBigInteger('fk_proyectoid');
            $table->foreign('fk_proyectoid')->references('id')->on('proyectos');
            $table->string('rol');
            $table->string('codigo');
            $table->enum('estatus',[0,1,2])->default(1);
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
        Schema::dropIfExists('users_proyectos');
    }
}

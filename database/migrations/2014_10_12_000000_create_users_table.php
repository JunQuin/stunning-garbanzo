<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('descripcion');
            $table->bigInteger('asesor')->unsigned();
            $table->boolean('participado');
            $table->bigInteger('tipo')->unsigned();
            $table->bigInteger('categoria')->unsigned();
            $table->bigInteger('subcategoria')->unsigned();
            $table->string('participante1_Nombre');
            $table->string('participante1_Apellidos');
            $table->string('participante1_Telefono');
            $table->string('participante1_Correo');
            $table->string('participante1_InstitucionProcedencia');
            $table->tinyInteger('participante1_NivelEducativo');
            $table->tinyInteger('participante1_TallaPlayera');
            $table->string('participante2_Nombre');
            $table->string('participante2_Apellidos');
            $table->string('participante2_Telefono');
            $table->string('participante2_Correo');
            $table->string('participante2_InstitucionProcedencia');
            $table->tinyInteger('participante2_NivelEducativo');
            $table->tinyInteger('participante2_TallaPlayera');
            $table->rememberToken();
            $table->timestamps();
            $table->boolean('status')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

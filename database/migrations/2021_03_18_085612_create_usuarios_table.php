<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
			$table->id('id_usuario');
            
			$table->string('tipo_usuario', 20)->nullable();
			$table->string('contrasena_usuario', 255)->nullable();
			$table->string('nombre_usuario', 100)->nullable();
			$table->string('apellido_usuario', 100)->nullable();
			$table->string('email_usuario', 150)->nullable();
			$table->integer('telefono_usuario')->nullable();
			$table->string('estatus_usuario', 20)->nullable();

			$table->date('fecha_alta_usuario')->nullable();
			$table->date('fecha_modificacion_usuario')->nullable();
			$table->date('fecha_baja_usuario')->nullable();

			//$table->id();
			//$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuario');
    }
}

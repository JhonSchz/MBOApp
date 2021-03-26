<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->id('id_empresa');
            
			$table->string('cif', 20)->unique()->nullable();
			$table->string('nombre_empresa', 100)->nullable();
			$table->string('ciudad_empresa', 100)->nullable();
			$table->string('direccion_empresa', 100)->nullable();
			$table->string('codigo_postal_empresa', 100)->nullable();
			$table->integer('telefono_empresa')->nullable();
			$table->string('email_empresa', 150)->unique()->nullable();	

			$table->date('fecha_alta_empresa')->nullable();
			$table->date('fecha_modificacion_empresa')->nullable();
			$table->date('fecha_baja_empresa')->nullable();

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
        Schema::dropIfExists('empresa');
    }
}

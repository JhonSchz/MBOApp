<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parte', function (Blueprint $table) {
            $table->id('id_parte');
			$table->unsignedBigInteger('id_usuario');		//Foreign key
			$table->unsignedBigInteger('id_averia');		//Foreign key
			
			$table->date('fecha_parte')->nullable();
			$table->time('hora_parte')->nullable();
			$table->integer('horas_realizadas')->nullable();
			$table->string('observaciones')->nullable();


			$table->date('fecha_alta_parte')->nullable();
			$table->date('fecha_modificacion_parte')->nullable();
			$table->date('fecha_baja_parte')->nullable();
			//$table->timestamps();
        });

	//Foreign key
		Schema::table('parte', function($table) {
       		$table->foreign('id_usuario')->references('id_usuario')->on('usuario');
       		$table->foreign('id_averia')->references('id_averia')->on('averia');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parte');
    }
}

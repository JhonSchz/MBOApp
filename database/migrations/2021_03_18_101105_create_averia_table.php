<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAveriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('averia', function (Blueprint $table) {
            $table->id('id_averia');
			$table->unsignedBigInteger('id_empresa');		//Foreign key

			$table->string('descripcion_averia', 255)->nullable();
			$table->string('estatus_averia', 20)->nullable();

			$table->date('fecha_alta_averia')->nullable();
			$table->date('fecha_modificacion_averia')->nullable();
			$table->date('fecha_baja_averia')->nullable();
            //$table->timestamps();
        });

	//Foreign key
		Schema::table('averia', function($table) {
       		$table->foreign('id_empresa')->references('id_empresa')->on('empresa');
		});
	
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('averia');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJugadoresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('jugadores', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nombre_posicion');
			$table->string('equipo');
			$table->string('carrera');
			$table->integer('semestre');
			$table->string('fotografia');
			$table->string('nombre');
			$table->string('app');
			$table->string('apm');
			$table->date('fecha_nacimiento');
			$table->integer('dorsal');
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
		Schema::drop('jugadores');
	}

}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTablaResultadosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tabla_resultados', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('encuentros_id');
			$table->integer('jugador_id');
			$table->string('equipo_jugador');
			$table->integer('goles');
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
		Schema::drop('tabla_resultados');
	}

}

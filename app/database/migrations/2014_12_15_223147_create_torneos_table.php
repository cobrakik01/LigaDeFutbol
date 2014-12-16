<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTorneosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('torneos', function(Blueprint $table) {
			$table->increments('id');
			$table->string('tipo_torneo');
			$table->date('fecha_torneo');
			$table->date('termino_torneo');
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
		Schema::drop('torneos');
	}

}

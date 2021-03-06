<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('PosicionesTableSeeder');
		$this->call('CarrerasTableSeeder');
		$this->call('SemestresTableSeeder');
		$this->call('Tipos_torneosTableSeeder');
		$this->call('Tipos_tarjetasTableSeeder');
		$this->call('JugadoresTableSeeder');
		$this->call('EquiposTableSeeder');
		$this->call('TorneosTableSeeder');
		$this->call('EncuentrosTableSeeder');
		$this->call('UsuariosTableSeeder');
		$this->call('Tabla_resultadosTableSeeder');
		$this->call('Tarjetas_jugadoresTableSeeder');
	}

}

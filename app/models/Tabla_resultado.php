<?php

class Tabla_resultado extends Eloquent {

	public $timestamps = false;
	
	protected $guarded = array();

	public static $rules = array(
		'encuentros_id' => 'required',
		'jugador_id' => 'required',
		'equipo_jugador' => 'required',
		'goles' => 'required'
	);
}

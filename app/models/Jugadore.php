<?php

class Jugadore extends Eloquent {
	
	protected $guarded = array();

	public static $rules = array(
		'nombre_posicion' => 'required',
		'equipo' => 'required',
		'carrera' => 'required',
		'semestre' => 'required',
		'nombre' => 'required',
		'app' => 'required',
		'fecha_nacimiento' => 'required',
		'dorsal' => 'required'
	);
}

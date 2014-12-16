<?php

class Equipo extends Eloquent {

	protected $primaryKey = 'nombre';

	public $timestamps = true;

	protected $guarded = array();

	public static $rules = array(
		'nombre' => 'required|unique:equipos'
	);

	public function jugadores()
	{
		return $this->hasMany('Jugadore', 'equipo');
	}
}

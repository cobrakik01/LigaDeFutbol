<?php

class Posicione extends Eloquent {

	protected $primaryKey = 'nombre_posicion';

	public $timestamps = false;

	protected $guarded = array();

	public static $rules = array(
		'nombre_posicion' => 'required'
	);
}

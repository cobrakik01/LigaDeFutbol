<?php

class Carrera extends Eloquent {

	protected $primaryKey = 'nombre_carrera';

	public $timestamps = false;
	
	protected $guarded = array();

	public static $rules = array(
		'nombre_carrera' => 'required|unique:carreras'
	);
}

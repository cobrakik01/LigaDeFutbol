<?php

class Tipos_tarjeta extends Eloquent {

	protected $primaryKey = 'tipo_tarjeta';

	public $timestamps = false;
	
	protected $guarded = array();

	public static $rules = array(
		'tipo_tarjeta' => 'required'
	);
}

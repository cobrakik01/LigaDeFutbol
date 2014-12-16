<?php

class Tarjetas_jugadore extends Eloquent {
	
	protected $guarded = array();

	public static $rules = array(
		'tipo_tarjeta' => 'required'
	);
}

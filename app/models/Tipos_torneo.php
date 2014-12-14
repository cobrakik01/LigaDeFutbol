<?php

class Tipos_torneo extends Eloquent {

	protected $primaryKey = 'tipo_torneo';

	public $timestamps = false;
	
	protected $guarded = array();

	public static $rules = array(
		'tipo_torneo' => 'required'
	);
}

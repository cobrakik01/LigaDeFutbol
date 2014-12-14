<?php

class Semestre extends Eloquent {

	protected $primaryKey = 'semestre';
	
	public $timestamps = false;

	protected $guarded = array();

	public static $rules = array(
		'semestre' => 'required'
	);
}

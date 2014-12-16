<?php

class Torneo extends Eloquent {
	
	protected $guarded = array();

	public static $rules = array(
		'tipo_torneo' => 'required|exists:tipos_torneos,tipo_torneo',
		'fecha_torneo' => 'required',
		'termino_torneo' => 'required'
	);

	public function tipoTorneo()
	{
		return $this->belongsTo('Tipos_torneo', 'tipo_torneo');
	}

	public function encuentros()
	{
		return $this->hasMany('Encuentro', 'torneo_id');
	}

}

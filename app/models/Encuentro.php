<?php

class Encuentro extends Eloquent {

	protected $guarded = [];

	public $timestamps = false;

	public static $rules = [
		'torneo_id' => 'required|exists:torneos,id',
		'equipo1' => 'required|exists:equipos,nombre',
		'equipo2' => 'required|exists:equipos,nombre'
	];

	public function torneo()
	{
		return $this->belongsTo('Torneo', 'id');
	}

	public function eq1()
	{
		return $this->belongsTo('Equipo', 'equipo1', 'nombre');
	}

	public function eq2()
	{
		return $this->belongsTo('Equipo', 'equipo2', 'nombre');
	}

	public function tablaResultados()
	{
		return $this->hasMany('Tabla_resultado', 'encuentros_id');
	}

	public function golesEquipo(Equipo $equipo)
	{
		return Tabla_resultado::where('encuentros_id', $this->id)->where('equipo_jugador', $equipo->nombre)->sum('goles');
	}

	public function golesJugador(Jugadore $jugador)
	{
		$goles = 0;
		$result = Tabla_resultado::where('encuentros_id', $this->id)
			->where('equipo_jugador', $jugador->equipo)
			->where('jugador_id', $jugador->id)
			->first();
			if(!is_null($result))
			{
				$goles = $result->goles;
			}
		return $goles;
	}

	public function tarjetasJugador(Jugadore $jugador)
	{
		$tj = [];
		$tr = Tabla_resultado::where('encuentros_id', $this->id)->where('jugador_id', $jugador->id)->where('equipo_jugador', $jugador->equipo)->first();
		if(!is_null($tr))
		{
			$tj = Tarjetas_jugadore::where('tabla_resultado_id', $tr->id)->get();
		}
		return $tj;
	}
}

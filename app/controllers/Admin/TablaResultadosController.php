<?php

namespace Admin;

use BaseController;
use View;
use Input;
use Validator;
use Redirect;
use Tabla_resultado;
use Encuentro;
use Jugadore;

class TablaResultadosController extends BaseController {

	public function getIndex(Encuentro $encuentro)
	{
		return View::make('admin.tabla_resultados.index', compact('encuentro'));
	}

	public function postAgregarGol(Encuentro $encuentro, Jugadore $jugador)
	{
		$tr = Tabla_resultado::where('encuentros_id', $encuentro->id)->where('jugador_id', $jugador->id)->first();
		if(is_null($tr))
		{
			$tablar = new Tabla_resultado;
			$tablar->encuentros_id = $encuentro->id;
			$tablar->jugador_id = $jugador->id;
			$tablar->equipo_jugador = $jugador->equipo;
			$tablar->goles = 1;
			$tablar->save();
		} else {
			$tr->goles += 1;
			$tr->save();
		}
		return Redirect::back();
	}

	public function postQuitarGol(Encuentro $encuentro, Jugadore $jugador)
	{
		$tr = Tabla_resultado::where('encuentros_id', $encuentro->id)->where('jugador_id', $jugador->id)->first();
		if(!is_null($tr))
		{
			if($tr->goles > 0)
			{
				$tr->goles -= 1;
				$tr->save();
			}
		}
		return Redirect::back();
	}

}
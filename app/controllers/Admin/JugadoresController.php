<?php

namespace Admin;

use BaseController;
use View;
use Input;
use Validator;
use Redirect;
use Jugadore;
use Posicione;
use Carrera;
use Semestre;
use Equipo;

class JugadoresController extends BaseController {

	/**
	 * Jugadore Repository
	 *
	 * @var Jugadore
	 */
	protected $jugadore;

	public function __construct(Jugadore $jugadore)
	{
		$this->jugadore = $jugadore;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$jugadores = $this->jugadore->all();

		return View::make('admin.jugadores.index', compact('jugadores'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$posiciones = Posicione::all();
		$carreras = Carrera::all();
		$semestres = Semestre::all();
		$equipos = Equipo::all();
		return View::make('admin.jugadores.create', compact('posiciones', 'carreras', 'semestres', 'equipos'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Jugadore::$rules);

		if(Jugadore::where('equipo', $input['equipo'])->count() > 15)
		{
			return Redirect::route('admin.jugadores.create')
			->with('message', 'Solo pueden existir 15 jugadores por equipo.');
		}

		if ($validation->passes())
		{
			$this->jugadore->create($input);

			return Redirect::route('admin.jugadores.index');
		}

		return Redirect::route('admin.jugadores.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$jugadore = $this->jugadore->findOrFail($id);

		return View::make('admin.jugadores.show', compact('jugadore'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$jugadore = $this->jugadore->find($id);

		if (is_null($jugadore))
		{
			return Redirect::route('admin.jugadores.index');
		}

		$posiciones = Posicione::all();
		$carreras = Carrera::all();
		$semestres = Semestre::all();
		$equipos = Equipo::all();

		return View::make('admin.jugadores.edit', compact('jugadore', 'posiciones', 'carreras', 'semestres', 'equipos'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Jugadore::$rules);

		if ($validation->passes())
		{
			$jugadore = $this->jugadore->find($id);
			$jugadore->update($input);

			return Redirect::route('admin.jugadores.show', $id);
		}

		return Redirect::route('admin.jugadores.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->jugadore->find($id)->delete();

		return Redirect::route('admin.jugadores.index');
	}

}

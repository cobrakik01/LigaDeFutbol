<?php

namespace Admin;

use BaseController;
use View;
use Input;
use Validator;
use Redirect;
use Encuentro;
use Torneo;
use Equipo;

class EncuentrosController extends BaseController {

	/**
	 * Encuentro Repository
	 *
	 * @var Encuentro
	 */
	protected $encuentro;

	public function __construct(Encuentro $encuentro)
	{
		$this->encuentro = $encuentro;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$encuentros = $this->encuentro->all();

		return View::make('admin.encuentros.index', compact('encuentros'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$torneos = Torneo::all();
		$equipos = Equipo::all();
		return View::make('admin.encuentros.create', compact('torneos', 'equipos'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Encuentro::$rules);

		if ($validation->passes())
		{
			$this->encuentro->create($input);

			return Redirect::route('admin.encuentros.index');
		}

		return Redirect::route('admin.encuentros.create')
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
		$encuentro = $this->encuentro->findOrFail($id);

		return View::make('admin.encuentros.show', compact('encuentro'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$encuentro = $this->encuentro->find($id);

		if (is_null($encuentro))
		{
			return Redirect::route('admin.encuentros.index');
		}

		$torneos = Torneo::all();
		$equipos = Equipo::all();

		return View::make('admin.encuentros.edit', compact('encuentro', 'torneos', 'equipos'));
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
		$validation = Validator::make($input, Encuentro::$rules);

		if ($validation->passes())
		{
			$encuentro = $this->encuentro->find($id);
			$encuentro->update($input);

			return Redirect::route('admin.encuentros.show', $id);
		}

		return Redirect::route('admin.encuentros.edit', $id)
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
		$this->encuentro->find($id)->delete();

		return Redirect::route('admin.encuentros.index');
	}

}

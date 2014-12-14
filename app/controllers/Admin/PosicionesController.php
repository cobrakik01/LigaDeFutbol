<?php

namespace Admin;

use BaseController;
use View;
use Input;
use Validator;
use Redirect;
use Posicione;

class PosicionesController extends BaseController {

	/**
	 * Posicione Repository
	 *
	 * @var Posicione
	 */
	protected $posicione;

	public function __construct(Posicione $posicione)
	{
		$this->posicione = $posicione;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posiciones = $this->posicione->all();

		return View::make('admin.posiciones.index', compact('posiciones'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.posiciones.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Posicione::$rules);

		if ($validation->passes())
		{
			$this->posicione->create($input);

			return Redirect::route('admin.posiciones.index');
		}

		return Redirect::route('admin.posiciones.create')
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
		$posicione = $this->posicione->findOrFail($id);

		return View::make('admin.posiciones.show', compact('posicione'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$posicione = $this->posicione->find($id);

		if (is_null($posicione))
		{
			return Redirect::route('admin.posiciones.index');
		}

		return View::make('admin.posiciones.edit', compact('posicione'));
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
		$validation = Validator::make($input, Posicione::$rules);

		if ($validation->passes())
		{
			$posicione = $this->posicione->find($id);
			$posicione->update($input);

			return Redirect::route('admin.posiciones.show', $input['nombre_posicion']);
		}

		return Redirect::route('admin.posiciones.edit', $id)
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
		$this->posicione->find($id)->delete();

		return Redirect::route('admin.posiciones.index');
	}

}

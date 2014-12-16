<?php

namespace Admin;

use BaseController;
use View;
use Input;
use Validator;
use Redirect;
use Equipo;

class EquiposController extends BaseController {

	/**
	 * Equipo Repository
	 *
	 * @var Equipo
	 */
	protected $equipo;

	public function __construct(Equipo $equipo)
	{
		$this->equipo = $equipo;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$equipos = $this->equipo->all();

		return View::make('admin.equipos.index', compact('equipos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.equipos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Equipo::$rules);

		if ($validation->passes())
		{
			$this->equipo->create($input);

			return Redirect::route('admin.equipos.index');
		}

		return Redirect::route('admin.equipos.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'El equipo ya existe.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$equipo = $this->equipo->findOrFail($id);

		return View::make('admin.equipos.show', compact('equipo'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$equipo = $this->equipo->find($id);

		if (is_null($equipo))
		{
			return Redirect::route('admin.equipos.index');
		}

		return View::make('admin.equipos.edit', compact('equipo'));
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
		$validation = Validator::make($input, Equipo::$rules);

		if ($validation->passes())
		{
			$equipo = $this->equipo->find($id);
			$equipo->update($input);

			return Redirect::route('admin.equipos.show', $input['nombre']);
		}

		return Redirect::route('admin.equipos.edit', $id)
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
		$this->equipo->find($id)->delete();

		return Redirect::route('admin.equipos.index');
	}

}

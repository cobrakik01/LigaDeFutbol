<?php

namespace Admin;

use BaseController;
use View;
use Input;
use Validator;
use Redirect;
use Carrera;

class CarrerasController extends BaseController {

	/**
	 * Carrera Repository
	 *
	 * @var Carrera
	 */
	protected $carrera;

	public function __construct(Carrera $carrera)
	{
		$this->carrera = $carrera;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$carreras = $this->carrera->all();

		return View::make('admin.carreras.index', compact('carreras'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.carreras.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Carrera::$rules);

		if ($validation->passes())
		{
			$this->carrera->create($input);

			return Redirect::route('admin.carreras.index');
		}

		return Redirect::route('admin.carreras.create')
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
		$carrera = $this->carrera->where('nombre_carrera', $id)->first();

		return View::make('admin.carreras.show', compact('carrera'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$carrera = $this->carrera->where('nombre_carrera', $id)->first();

		if (is_null($carrera))
		{
			return Redirect::route('admin.carreras.index');
		}

		return View::make('admin.carreras.edit', compact('carrera'));
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
		$validation = Validator::make($input, Carrera::$rules);

		if ($validation->passes())
		{
			$carrera = $this->carrera->where('nombre_carrera', $id)->first();
			$carrera->nombre_carrera = $input['nombre_carrera'];
			$carrera->save();
			// $carrera->update($input);

			return Redirect::route('admin.carreras.show', $input['nombre_carrera']);
		}

		return Redirect::route('admin.carreras.edit', $id)
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
		$this->carrera->find($id)->delete();

		return Redirect::route('admin.carreras.index');
	}

}

<?php

namespace Admin;

use BaseController;
use View;
use Input;
use Validator;
use Redirect;
use Tipos_torneo;

class TiposTorneosController extends BaseController {

	/**
	 * Tipos_torneo Repository
	 *
	 * @var Tipos_torneo
	 */
	protected $tipos_torneo;

	public function __construct(Tipos_torneo $tipos_torneo)
	{
		$this->tipos_torneo = $tipos_torneo;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tipos_torneos = $this->tipos_torneo->all();

		return View::make('admin.tipos_torneos.index', compact('tipos_torneos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.tipos_torneos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Tipos_torneo::$rules);

		if ($validation->passes())
		{
			$this->tipos_torneo->create($input);

			return Redirect::route('admin.tipos_torneos.index');
		}

		return Redirect::route('admin.tipos_torneos.create')
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
		$tipos_torneo = $this->tipos_torneo->findOrFail($id);

		return View::make('admin.tipos_torneos.show', compact('tipos_torneo'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tipos_torneo = $this->tipos_torneo->find($id);

		if (is_null($tipos_torneo))
		{
			return Redirect::route('admin.tipos_torneos.index');
		}

		return View::make('admin.tipos_torneos.edit', compact('tipos_torneo'));
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
		$validation = Validator::make($input, Tipos_torneo::$rules);

		if ($validation->passes())
		{
			$tipos_torneo = $this->tipos_torneo->find($id);
			$tipos_torneo->update($input);

			return Redirect::route('admin.tipos_torneos.show', $input['tipo_torneo']);
		}

		return Redirect::route('admin.tipos_torneos.edit', $id)
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
		$this->tipos_torneo->find($id)->delete();

		return Redirect::route('admin.tipos_torneos.index');
	}

}

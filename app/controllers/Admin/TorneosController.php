<?php

namespace Admin;

use BaseController;
use View;
use Input;
use Validator;
use Redirect;
use Tipos_torneo;
use Torneo;

class TorneosController extends BaseController {

	/**
	 * Torneo Repository
	 *
	 * @var Torneo
	 */
	protected $torneo;

	public function __construct(Torneo $torneo)
	{
		$this->torneo = $torneo;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$torneos = $this->torneo->all();

		return View::make('admin.torneos.index', compact('torneos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$torneos = Tipos_torneo::all();
		return View::make('admin.torneos.create', compact('torneos'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Torneo::$rules);

		if ($validation->passes())
		{
			$this->torneo->create($input);

			return Redirect::route('admin.torneos.index');
		}

		return Redirect::route('admin.torneos.create')
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
		$torneo = $this->torneo->findOrFail($id);

		return View::make('admin.torneos.show', compact('torneo'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$torneo = $this->torneo->find($id);

		if (is_null($torneo))
		{
			return Redirect::route('admin.torneos.index');
		}

		$torneos = Tipos_torneo::all();
		return View::make('admin.torneos.edit', compact('torneo', 'torneos'));
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
		$validation = Validator::make($input, Torneo::$rules);

		if ($validation->passes())
		{
			$torneo = $this->torneo->find($id);
			$torneo->update($input);

			return Redirect::route('admin.torneos.show', $id);
		}

		return Redirect::route('admin.torneos.edit', $id)
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
		$this->torneo->find($id)->delete();

		return Redirect::route('admin.torneos.index');
	}

}

<?php

namespace Admin;

use BaseController;
use View;
use Input;
use Validator;
use Redirect;
use Semestre;

class SemestresController extends BaseController {

	/**
	 * Semestre Repository
	 *
	 * @var Semestre
	 */
	protected $semestre;

	public function __construct(Semestre $semestre)
	{
		$this->semestre = $semestre;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$semestres = $this->semestre->all();

		return View::make('admin.semestres.index', compact('semestres'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.semestres.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Semestre::$rules);

		if ($validation->passes())
		{
			$this->semestre->create($input);

			return Redirect::route('admin.semestres.index');
		}

		return Redirect::route('admin.semestres.create')
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
		$semestre = $this->semestre->findOrFail($id);

		return View::make('admin.semestres.show', compact('semestre'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$semestre = $this->semestre->find($id);

		if (is_null($semestre))
		{
			return Redirect::route('admin.semestres.index');
		}

		return View::make('admin.semestres.edit', compact('semestre'));
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
		$validation = Validator::make($input, Semestre::$rules);

		if ($validation->passes())
		{
			$semestre = $this->semestre->find($id);
			$semestre->update($input);

			return Redirect::route('admin.semestres.show', $input['semestre']);
		}

		return Redirect::route('admin.semestres.edit', $id)
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
		$this->semestre->find($id)->delete();

		return Redirect::route('admin.semestres.index');
	}

}

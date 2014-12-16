<?php

class Tarjetas_jugadoresController extends BaseController {

	/**
	 * Tarjetas_jugadore Repository
	 *
	 * @var Tarjetas_jugadore
	 */
	protected $tarjetas_jugadore;

	public function __construct(Tarjetas_jugadore $tarjetas_jugadore)
	{
		$this->tarjetas_jugadore = $tarjetas_jugadore;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tarjetas_jugadores = $this->tarjetas_jugadore->all();

		return View::make('tarjetas_jugadores.index', compact('tarjetas_jugadores'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('tarjetas_jugadores.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Tarjetas_jugadore::$rules);

		if ($validation->passes())
		{
			$this->tarjetas_jugadore->create($input);

			return Redirect::route('tarjetas_jugadores.index');
		}

		return Redirect::route('tarjetas_jugadores.create')
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
		$tarjetas_jugadore = $this->tarjetas_jugadore->findOrFail($id);

		return View::make('tarjetas_jugadores.show', compact('tarjetas_jugadore'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tarjetas_jugadore = $this->tarjetas_jugadore->find($id);

		if (is_null($tarjetas_jugadore))
		{
			return Redirect::route('tarjetas_jugadores.index');
		}

		return View::make('tarjetas_jugadores.edit', compact('tarjetas_jugadore'));
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
		$validation = Validator::make($input, Tarjetas_jugadore::$rules);

		if ($validation->passes())
		{
			$tarjetas_jugadore = $this->tarjetas_jugadore->find($id);
			$tarjetas_jugadore->update($input);

			return Redirect::route('tarjetas_jugadores.show', $id);
		}

		return Redirect::route('tarjetas_jugadores.edit', $id)
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
		$this->tarjetas_jugadore->find($id)->delete();

		return Redirect::route('tarjetas_jugadores.index');
	}

}

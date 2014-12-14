<?php
namespace Admin;

use BaseController;
use View;
use Input;
use Validator;
use Redirect;
use Tipos_tarjeta;

class TiposTarjetasController extends BaseController {

	/**
	 * Tipos_tarjeta Repository
	 *
	 * @var Tipos_tarjeta
	 */
	protected $tipos_tarjeta;

	public function __construct(Tipos_tarjeta $tipos_tarjeta)
	{
		$this->tipos_tarjeta = $tipos_tarjeta;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$tipos_tarjetas = $this->tipos_tarjeta->all();

		return View::make('admin.tipos_tarjetas.index', compact('tipos_tarjetas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.tipos_tarjetas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Tipos_tarjeta::$rules);

		if ($validation->passes())
		{
			$this->tipos_tarjeta->create($input);

			return Redirect::route('admin.tipos_tarjetas.index');
		}

		return Redirect::route('admin.tipos_tarjetas.create')
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
		$tipos_tarjeta = $this->tipos_tarjeta->findOrFail($id);

		return View::make('admin.tipos_tarjetas.show', compact('tipos_tarjeta'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$tipos_tarjeta = $this->tipos_tarjeta->find($id);

		if (is_null($tipos_tarjeta))
		{
			return Redirect::route('admin.tipos_tarjetas.index');
		}

		return View::make('admin.tipos_tarjetas.edit', compact('tipos_tarjeta'));
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
		$validation = Validator::make($input, Tipos_tarjeta::$rules);

		if ($validation->passes())
		{
			$tipos_tarjeta = $this->tipos_tarjeta->find($id);
			$tipos_tarjeta->update($input);

			return Redirect::route('admin.tipos_tarjetas.show', $input['tipo_tarjeta']);
		}

		return Redirect::route('admin.tipos_tarjetas.edit', $id)
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
		$this->tipos_tarjeta->find($id)->delete();

		return Redirect::route('admin.tipos_tarjetas.index');
	}

}

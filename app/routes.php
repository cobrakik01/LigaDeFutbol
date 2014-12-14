<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::resource('admin/posiciones', 'Admin\PosicionesController');

Route::resource('admin/carreras', 'Admin\CarrerasController');

Route::resource('admin/semestres', 'Admin\SemestresController');

Route::resource('admin/tipos_torneos', 'Admin\TiposTorneosController');

Route::resource('admin/tipos_tarjetas', 'Admin\TiposTarjetasController');

Route::resource('admin/jugadores', 'Admin\JugadoresController');

Route::resource('admin/equipos', 'Admin\EquiposController');
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
	// return View::make('hello');
	return "ok";
});


Route::get('admin/login', ['as' => 'admin.login', 'uses' => 'Admin\SessionController@getLogin']);

Route::post('admin/login', 'Admin\SessionController@postLogin');

Route::get('admin/logout', ['as' => 'admin.logout', 'uses' => 'Admin\SessionController@getLogout']);

Route::get('admin', ['as' => 'admin', 'uses' => 'Admin\HomeController@getIndex'])->before('auth');

Route::group(['before' => 'auth'], function(){

	Route::resource('admin/posiciones', 'Admin\PosicionesController');

	Route::resource('admin/carreras', 'Admin\CarrerasController');

	Route::resource('admin/semestres', 'Admin\SemestresController');

	Route::resource('admin/tipos_torneos', 'Admin\TiposTorneosController');

	Route::resource('admin/tipos_tarjetas', 'Admin\TiposTarjetasController');

	Route::resource('admin/jugadores', 'Admin\JugadoresController');

	Route::resource('admin/equipos', 'Admin\EquiposController');

	Route::resource('admin/torneos', 'Admin\TorneosController');

	Route::resource('admin/encuentros', 'Admin\EncuentrosController');

	Route::resource('admin/usuarios', 'Admin\UsuariosController');

	Route::model('encuentro', 'Encuentro');
	Route::model('jugador', 'Jugadore');
	Route::get('admin/encuentros/{encuentro}/tabla-resultados', ['as' => 'admin.tr.index', 'uses' => 'Admin\TablaResultadosController@getIndex']);
	Route::post('admin/encuentros/{encuentro}/{jugador}/agregar-gol', ['as' => 'admin.tr.agregar.gol', 'uses' => 'Admin\TablaResultadosController@postAgregarGol']);
	Route::post('admin/encuentros/{encuentro}/{jugador}/quitar-gol', ['as' => 'admin.tr.quitar.gol', 'uses' => 'Admin\TablaResultadosController@postQuitarGol']);

});

Route::resource('tarjetas_jugadores', 'Tarjetas_jugadoresController');
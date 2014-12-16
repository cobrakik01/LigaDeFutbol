<?php

namespace Admin;

use BaseController;
use View;
use Input;
use Validator;
use Redirect;
use Auth;

class SessionController extends BaseController {
	
	public function getLogin()
	{
		return View::make('admin.login');
	}

	public function postLogin()
	{
		$input = Input::except(['_token']);
		if (Auth::attempt($input))
		{
		    return Redirect::intended('admin');
		}
		return Redirect::action('admin.login')->with('message', ['type' => 'warning', 'msg' => 'Acceso denegado'])->withInput();
	}

	public function getLogout()
	{
		Auth::logout();
		return Redirect::route('admin');
	}

}
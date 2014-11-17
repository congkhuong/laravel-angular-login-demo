<?php

class UserController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function signin(){
		return View::make('frontend.users.signin');
	}

	public function home(){
		//echo "string";exit();
		//echo "string";exit();
		return View::make('frontend.home.home');
	}

	public function test(){
		return View::make('frontend.home.test');
	}
}
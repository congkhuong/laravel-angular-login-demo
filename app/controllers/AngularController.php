<?php

class AngularController extends FController {

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

	public function index(){
		$users = DB::table('users')->distinct()->get();
		$users = json_encode($users);
		echo $users;
		exit();
	}
	
	public function get(){

		$user = User::all();

		dd($user);
		exit();
	}

	public function detail($id){
		$user = User::find($id);
		$user = json_encode($user);
		echo $user;
		exit();
	}

}

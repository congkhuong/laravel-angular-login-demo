<?php

class UserAngularController extends BaseController {

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

	public function getsession(){
		$sess = array();
		if (Auth::check()){
		    $sess["uid"] = Auth::user()->id;
            $sess["name"] = Auth::user()->username;
            $sess["email"] = Auth::user()->email;
		}else{
			$sess["uid"] = '';
	        $sess["name"] = 'Guest';
	        $sess["email"] = '';
		}
        //echo "<pre>"; var_dump($sess); die('123');
		echo json_encode($sess);
	}

	public function signup(){
        // the way to get data from payload
		$response = array();
		$request_body = file_get_contents('php://input');
		$data_from_payload = json_decode($request_body);
        // Set variables for datas
		$datas = array(
			'username'=>$data_from_payload->customer->name,
			'email'=>$data_from_payload->customer->email,
			'password'=>$data_from_payload->customer->password,
			'phone'=>$data_from_payload->customer->phone,
			'address'=>$data_from_payload->customer->address
		);
        // get rules
		$rules = User::$rules;

		$validators = Validator::make($datas,$rules);
		if ($validators->fails()) {
            // get all error messages
            $messagesrs = '';
            $messages = $validators->messages();
            foreach ($messages->all() as $message){
                $messagesrs .= $message.'<br>';
            }
            
        	$response["status"] = "error";
            $response["message"] = $messagesrs;
            
        }else{
            $user = new User();
            $user->fill($datas);
            $user->password= Hash::make($data_from_payload->customer->password);
            $user->save();
            Auth::loginUsingId($user->id);

            $response["status"] = "success";
            $response["message"] = "User account created successfully";
            $response["uid"] = $user->id;
        }
        echo json_encode($response);
	}

    /**
     * Login function.
     */
    public function login(){
        $response = array();
        $request_body = file_get_contents('php://input');
        $data_from_payload = json_decode($request_body);

        $user = array(
            'email' => $data_from_payload->customer->email,
            'password' => $data_from_payload->customer->password
        );
        
        if(Auth::attempt($user)){
            $response["status"] = "success";
            $response["message"] = "You logined successfully.";
        }else {
            $response["status"] = "error";
            $response["message"] = "Your username/password combination was incorrect.";
        }
        echo json_encode($response);
    }

    /**
     * Logout function.
     */
    public function logout(){
        Auth::logout();
        $this->messagereturn('success' , 'You logged out successfully.');
    }

    /**
     * Message return.
     */
    protected function messagereturn($status , $message){
        $response = array();
        $response['status'] = $status;
        $response['message'] = $message;
        echo json_encode($response);
        //return Response::json($response);
        //exit();
    }
}

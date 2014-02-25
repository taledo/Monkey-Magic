<?php

class HomeController extends BaseController {

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

	public function showForm()
	{
		return View::make('index');
	}

	public function postForm() {


		$rules =  $rules = array(
			'fname' => 'required',
			'lname' => 'required',
			'email' => 'required|email'
		);

	    $validator = Validator::make(Input::all(), $rules);
	    $messages = $validator->messages();
	 
	    if ($validator->fails())
	    {
	    	//Fail - Return errors and user posted input values (to re-populate form)
	        return Redirect::to('/')->withErrors($validator, $messages)->withInput();;
	    } 
	   
	    else
	    {
	    	 //Pass
	        return Redirect::to('/')->with("thanks", "true");
	    } 


	}

}
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
			'sname' => 'required',
			'email' => 'required|email',
			'phone' => 'required|numeric',
			'address' => 'required',
			'suburb' => 'required',
			'state' => 'required',
			'postcode' => 'required',
			'subject' => 'required',
			//Conditionally required
			'pname' => 'required_if:subject,Complaint',
			'psize' => 'required_if:subject,Complaint',
			'useby' => 'required_if:subject,Complaint',
			'batch' => 'required_if:subject,Complaint'
		);

		//Custom messages (a little more user-friendly)
		$messages = array(
		    'required' => 'The :attribute field is required.',
		    'email' => 'Please enter a valid email address',
		    'phone.numeric' => 'Please enter a valid phone number',
		    'postcode.numeric' => 'Please enter a valid postcode',
		    'pname.required_if' => 'The Product name is required because you have chosen Product Complaint',
		    'psize.required_if' => 'The Product size is required because you have chosen Product Complaint',
		    'useby.required_if' => 'The Use-by date is required because you have chosen Product Complaint',
		    'batch.required_if' => 'The Batch code is required because you have chosen Product Complaint'
		);

	    $validator = Validator::make(Input::all(), $rules, $messages);
	    //$messages = $validator->messages();
	 
	    if ($validator->fails())
	    {
	    	//Fail - Return errors and user posted input values (to re-populate form)
	        return Redirect::to('/')->withErrors($validator, $messages)->withInput();
	    } 
	   
	    else
	    {
	    	 //Pass
	        return Redirect::to('/')->with("thanks", "true");
	        //TODO: Hook up to a model for some DB love
	    } 


	}

}
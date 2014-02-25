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

// These routes will be cached, if you configure a non-zero bladeCacheExpiry.
// Full documentation at https://github.com/TheMonkeys/laravel-blade-cache-filter
Route::group(array('before' => 'cache', 'after' => 'cache'), function() {

	Route::get('/css/{filename}.css', function($filename) {
		return Bust::css("/css/$filename.css");
	});

});
App::make('cachebuster.StripSessionCookiesFilter')->addPattern('|css/|');

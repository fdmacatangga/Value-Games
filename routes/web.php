<?php
use \Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MatchesController@index');
Route::get('/match/{id}/{title?}', 'MatchesController@match');
Route::post('/match/post','MatchesController@savePrediction');
Route::get('/error404','MatchesController@error404')->name('error404');
Route::get('/signup','MatchesController@signup')->name('signup');
Route::post('/signup','AuthController@save');

Route::get('profile/my-account','ProfileController@myAccount');


Route::get('login', [ 'as' => 'login', 'uses' => 'AuthController@login']);
Route::post('login', [ 'as' => 'checklogin', 'uses' => 'AuthController@checklogin']);
Route::get('signout','AuthController@logout');

Route::get('auth/steam', 'AuthController@redirectToSteam')->name('auth.steam');
Route::get('auth/steam/handle', 'AuthController@handle')->name('auth.steam.handle');
Route::get('auth/twitter/login', 'AuthController@redirectToProvider');
Route::get('auth/twitter/callback', 'AuthController@handleProviderCallback');

Route::post('/ajax/select-team','AjaxController@selectTeam');

//below are test routes 

Route::get('points','MatchesController@getBalance');
Route::get('axiostest',function(){
	return ['Laravel','flex','vue','meekro'];
});
Route::post('axiospost',function(Request $request){
	return $request->name;
});

Route::get('/component-test',function(){
	return array(
		'points' => 81,
		'team1' => 'Liquid',
		'team2' => 'Gambit',
		'details' => 'Match Winner'
	);
});
Route::get('component',function(){
	return view('front.test');
});
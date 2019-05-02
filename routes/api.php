<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Setup CORS */
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/addPointage', 'ApiController@addPointage');

Route::post('/addMessage', 'ApiController@addMessage');

Route::get('/time', 'ApiController@getTime');

Route::group(['middleware' => ['auth:api', 'cors']], function() {
	Route::get('/listeSitesClient', 'ApiController@retourner_liste_sites_client');	
	Route::get('/listeEmployeNonPointes', 'SupervisionController@listeEmployeNonPointes');
	Route::put('/modifier_password','ApiController@modifier_password');
});

Route::post('logout', 'Auth\LoginController@apilogout');

Route::post('login', 'Auth\LoginController@apilogin');
<?php

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

Route::middleware(['auth'])->group(function () {
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('/', 'DashboardController@index')->name('dashboard');
	Route::resource('client', 'ClientController');
	Route::resource('employe', 'EmployeController');
	Route::resource('pointage', 'PointageController');
	Route::resource('site', 'SiteController');
	Route::resource('user', 'UserController');
	Route::get('/carte', 'SupervisionController@index')->name('carte');
	Route::get('/afficherTableauListeEmployeNonPointe', 'SupervisionController@afficherTableauListeEmployeNonPointe')->name('afficherTableauListeEmployeNonPointe');
	Route::get('/afficherTableauMessages', 'SupervisionController@afficherTableauMessages')->name('afficherTableauMessages');
});
Route::middleware(['dash'])->group(function(){
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('/', 'DashboardController@index')->name('dashboard');
});
Route::middleware(['admin'])->group(function(){
	Route::resource('user', 'UserController');
	
});
Route::middleware(['dcom'])->group(function(){
	Route::resource('client', 'ClientController');
	Route::resource('site', 'SiteController');
});
Route::middleware(['drh'])->group(function(){
	Route::resource('employe', 'EmployeController');

});
Route::middleware(['spviseur'])->group(function(){
	Route::get('/carte', 'SupervisionController@index')->name('carte');
	Route::get('/afficherTableauListeEmployeNonPointe', 'SupervisionController@afficherTableauListeEmployeNonPointe')->name('afficherTableauListeEmployeNonPointe');
	Route::get('/afficherTableauMessages', 'SupervisionController@afficherTableauMessages')->name('afficherTableauMessages');

});
Auth::routes();
//Route::get('login', 'LoginController@login')->name('login');

//Route::post('login', 'LoginController@login');
//Route::post('logout', 'LoginController@logout')->name('logout');


Route::get('/listeCurrentPointages', 'SupervisionController@listeCurrentPointages')->name('listeCurrentPointages');

Route::get('/listeSites', 'SupervisionController@listeSites')->name('listeSites');




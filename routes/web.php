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
Route::post('/editPassword', 'UserController@editPassword')->name('editPassword');

Route::post('/deleteAll', 'ClientController@destroyAll')->name('deleteAll');
Route::post('/deleteAllEmploye', 'EmployeController@destroyAll')->name('deleteAllEmploye');
Route::post('/deleteAllSite', 'SiteController@destroyAll')->name('deleteAllSite');
Route::post('/deleteAllPointage', 'PointageController@destroyAll')->name('deleteAllPointage');
//Route::post('/deleteAllInformation', 'InformationController@destroyAll')->name('deleteAllInformation');

Route::middleware(['auth','dash'])->group(function(){
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('/', 'DashboardController@index')->name('dashboard');
});
Route::middleware(['auth','admin'])->group(function(){
	Route::resource('user', 'UserController');
	Route::resource('pointage', 'PointageController');
	Route::resource('role', 'RoleController');
	//Route::resource('information', 'InformationController');
});
Route::middleware(['auth','dcom'])->group(function(){
	Route::resource('client', 'ClientController');
	Route::resource('site', 'SiteController');
});
Route::middleware(['auth','drh'])->group(function(){
	Route::resource('employe', 'EmployeController');
	

});
Route::middleware(['auth','spviseur'])->group(function(){
	Route::get('/carte', 'SupervisionController@index')->name('carte');
	Route::get('/afficherTableauListeEmployeNonPointe', 'SupervisionController@afficherTableauListeEmployeNonPointe')->name('afficherTableauListeEmployeNonPointe');
	Route::get('/afficherTableauMessages', 'SupervisionController@afficherTableauMessages')->name('afficherTableauMessages');

});
Auth::routes();
//Route::get('login', 'LoginController@login')->name('login');

//Route::post('login', 'LoginController@login');
//Route::post('logout', 'LoginController@logout')->name('logout');

Route::get('/listeEmployeNonPointes', 'SupervisionController@listeEmployeNonPointes')->name('listeEmployeNonPointes');

Route::get('/listeCurrentPointages', 'SupervisionController@listeCurrentPointages')->name('listeCurrentPointages');

Route::get('/listeSites', 'SupervisionController@listeSites')->name('listeSites');




<?php

use Illuminate\Support\Facades\Route;

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

URL::forceScheme('https');
/*	
Route::get('/test', function () {
	return view('test');
});
*/
Auth::routes();
	Route::get('/', function () {
		return view('inicio');
	});
	Route::get('/offline', function () {
		return view('vendor/laravelpwa/offline');
	});
	Route::resource("empresa", EmpresaController::class);
	Route::resource("averia", AveriaController::class);
		Route::get('/getAverias', 'ParteController@getAverias')->name('getAverias');
	Route::resource("parte", ParteController::class);
	Route::resource("usuario", UsuarioController::class);

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
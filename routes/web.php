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
/*
Route::get('/inicio', function () {
    return view('inicio');
});
Route::get('/test', function () {
	return view('test');
});
*/


Route::resource("empresa", EmpresaController::class);
Route::resource("averia", AveriaController::class);


/*
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
*/
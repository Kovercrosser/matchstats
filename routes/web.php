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

Route::get('/', function () {
    return redirect('/home');
});
Auth::routes();

Route::get('/home', 'App\Http\Controllers\TournamentController@index');
Route::get('/home/create', 'App\Http\Controllers\TournamentController@create');
Route::post('/home/create', 'App\Http\Controllers\TournamentController@add');

Route::get('/home/{id}', 'App\Http\Controllers\TournamentController@detail')->where('id', '[0-9]+');
Route::get('/home/{id}/create', 'App\Http\Controllers\GameController@create')->where('id', '[0-9]+');
Route::post('/home/{id}/create', 'App\Http\Controllers\GameController@add')->where('id', '[0-9]+');

Route::get('/game/{id}', 'App\Http\Controllers\GameController@detail')->where('id', '[0-9]+');

Route::get('/user/{id}', 'App\Http\Controllers\TournamentController@user_statistics')->where('id', '[0-9]+');

Route::get('/statistic', 'App\Http\Controllers\StatisticsController@index');

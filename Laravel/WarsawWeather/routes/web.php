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

Route::get('/', 'Controller@index');
Route::get('/download', 'Controller@downloadWeather');
<<<<<<< HEAD
Route::get('/cache', 'Controller@cache');

=======
>>>>>>> 80d1dfa85c7150b001596930515bb38fca815807

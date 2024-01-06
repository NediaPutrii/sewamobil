<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return view('welcome');
});

Route::get('/redirects',[HomeController::class,"index"])->name('index');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/pemilikindex', 'App\Http\Controllers\MobilController@index')->name('pemilikindex');
Route::get('/mobilkucreate', 'App\Http\Controllers\MobilController@create')->name('mobilkucreate');
Route::post('/mobilkustore', 'App\Http\Controllers\MobilController@store')->name('mobilkustore');
Route::get('/mobilkuedit/{id}','App\Http\Controllers\MobilController@edit')->name('mobilkuedit');
Route::put('/mobilkuupdate/{id}','App\Http\Controllers\MobilController@update')->name('mobilkuupdate');
Route::delete('/mobilkudestroy/{id}','App\Http\Controllers\MobilController@destroy')->name('mobilkudestroy');

Route::get('/sewaindex', 'App\Http\Controllers\SewaController@index')->name('sewaindex');
Route::get('/sewacreate/{id_mobil}', 'App\Http\Controllers\SewaController@create')->name('sewacreate');
Route::post('/sewastore', 'App\Http\Controllers\SewaController@store')->name('sewastore');
Route::put('/sewakureturn/{id}','App\Http\Controllers\SewaController@update')->name('sewakureturn');


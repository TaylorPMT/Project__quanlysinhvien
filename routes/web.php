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


Route::get('','Frontend\Page@home__Page')->name('home__Page');

    //Login student
Route::get('loginStudent','Frontend\Page@loginStudent')->name('loginStudent');
Route::post('loginStudent','Frontend\Page@postloginStudent')->name('postloginStudent');

    //registration student

Route::group(['prefix' => 'student','middleware'=>'LoginStudent'], function () {
    Route::get('','Frontend\Page@dashboard')->name('dashboard');
    Route::group(['prefix' => 'controllers'], function () {
        Route::get('registration','Frontend\Page@registrationStudent')->name('registrationStudent');

    });

});
//Backend
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@show_dashboard');
Route::get('/logout', 'AdminController@logout');
Route::post('/admin-dashboard', 'AdminController@dashboard');

Route::get('logout','Frontend\Page@logout')->name('logout');

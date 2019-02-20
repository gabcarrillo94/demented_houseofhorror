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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

Route::get('/', 'PagesController@index');
Route::get('thanks', 'PagesController@success');
Route::get('error', 'PagesController@error');
Route::get('login658_panel.php', 'PagesController@back_end');

Route::get('dont_email', 'PagesController@dont_email');

Route::resource('email', 'EmailController');


Route::get('booking', 'ReservationController@index');

Route::post('booking/create', 'ReservationController@create_booking');


Route::get('reservation/success', 'ReservationController@success');
Route::get('reservation/cancel', 'ReservationController@cancel');

Route::get('reservation/change_date', 'ReservationController@change_date');

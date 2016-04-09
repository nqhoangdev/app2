<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'PagesController@index');

Route::get('/book', 'TicketsController@create');

Route::post('/book', 'TicketsController@store');

//Route::post

Route::get('/tickets', 'TicketsController@index');

Route::get('/ticket/{slug?}', 'TicketsController@show');

Route::get('/ticket/{slug?}/edit', 'TicketsController@edit');

Route::post('/ticket/{slug?}/edit', 'TicketsController@update');

Route::post('/ticket/{slug?}/delete', 'TicketsController@destroy');

Route::post('/comment', 'CommentsController@newComment');

Route::get('users/register', 'Auth\AuthController@getRegister');
Route::post('users/register', 'Auth\AuthController@postRegister');

Route::get('email', function () {

    $data = array(
        'name' => "Learning Laravel",
    );

    Mail::send('emails.welcome', $data, function ($message) {

        $message->from('yourEmail@domain.com', 'Learning Laravel');

        $message->to('yourEmail@domain.com')->subject('Learning Laravel test email');

    });

    return "Your email has been sent successfully";

});
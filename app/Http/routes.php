<?php


Route::group(['middleware' => ['auth']], function()
{
    Route::get('/user/profile', 'UsersController@profile');
    Route::get('/user/settings/', 'UsersController@settings');
    Route::get('/ticket/create', 'TicketsController@create');
    Route::get('/ticket/{id}/edit', 'TicketsController@edit')
        ->where('id', '[0-9]+');
    Route::put('/ticket/{id}', 'TicketsController@update')
        ->where('id', '[0-9]+');
    Route::post('/ticket/{id}', 'CommentsController@store')
        ->where('id', '[0-9]+');
    Route::get('/admin', 'UsersController@admin');
    Route::delete('/ticket/{id}', 'TicketsController@destroy');
});

Route::get('/', 'TicketsController@all');
Route::get('/tickets', 'TicketsController@all');
Route::post('/tickets', 'TicketsController@store');
Route::get('/ticket/{id}', [
    'as' => 'ticket_show',
    'uses' => 'TicketsController@show'
])->where('id', '[0-9]+');
Route::get('/tickets/user/{id}', 'TicketsController@tickets_by_user')->where('id', '[0-9]+');
Route::get('/tickets/backlog/{id}', 'TicketsController@tickets_by_backlog')
    ->where('id', '[0-9]+');
Route::get('/tickets/status/{status}', 'TicketsController@tickets_by_status')
    ->where('status', '[A-Za-z]+');
Route::get('/tickets/type/{type}', 'TicketsController@tickets_by_type')
    ->where('type', '[A-Za-z]+');
Route::get('/tickets/priority/{priority}', 'TicketsController@tickets_by_priority')
    ->where('priority', '[A-Za-z]+');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

<?php

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Route::resource('users', 'UsersController');
    Route::get('users/{id}/destroy', [
        'uses' => 'UsersController@destroy',
        'as'   => 'admin.users.destroy'
    ]);
    Route::resource('ots', 'OtsController');
    Route::resource('oc', 'OcController');
    Route::resource('presupuesto', 'PresupuestoController');
});

Route::resource('cliente', 'ClienteController');

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});

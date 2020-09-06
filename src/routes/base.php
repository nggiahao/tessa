<?php

Route::group([
    'namespace' => 'Nggiahao\Tessa\app\Http\Controllers',
    'middleware' => ['web'],
    'prefix'     => 'admin',
],
function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('tessa.auth.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'LoginController@logout')->name('tessa.auth.logout');
});
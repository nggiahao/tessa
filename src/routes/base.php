<?php

Route::group([
    'namespace' => 'Nggiahao\Tessa\app\Http\Controllers',
    'middleware' => ['web'],
    'prefix'     => 'admin',
],
function () {
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('tessa.auth.login');
    Route::post('login', 'Auth\LoginController@login');

    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('tessa.auth.register');
    Route::post('register', 'Auth\RegisterController@register');

    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('tessa.password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('tessa.password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('tessa.password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('tessa.password.update');

    Route::group([
        'middleware' => ['auth.admin'],
    ], function () {
        Route::post('logout', 'Auth\LoginController@logout')->name('tessa.auth.logout');

        Route::get('/', 'AdminController@dashboard')->name('tessa');
        Route::get('dashboard', 'AdminController@dashboard')->name('tessa.dashboard');
    });

});
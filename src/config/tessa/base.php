<?php

return [
    /*
    |--------------------------------------------------------------------------
    | TESSA BASE
    |--------------------------------------------------------------------------
    |
    |
    */

    // Project name. Shown in the window title.
    'project_name' => 'Tessa Admin Panel',

    // Menu logo. You can replace this with an <img> tag if you have a logo.
    'project_logo'   => '<b>Tes</b>sa',

    // When clicking on the admin panel's top-left logo/name,
    // where should the user be redirected?
    // The string below will be passed through the url() helper.
    // - default: '' (project root)
    'home_link' => '',

    // Date & Datetime Format Syntax: https://carbon.nesbot.com/docs/#api-localization
    'date_format'     => 'D MMM YYYY',
    'datetime_format' => 'D MMM YYYY, HH:mm',

    // CSS files that are loaded in all pages, using Laravel's asset() helper
    'styles' => [

    ],

    // JS files that are loaded in all pages, using Laravel's asset() helper
    'scripts' => [

    ],

    // Choose whether new users/admins are allowed to register
    'registration_open' => env('BACKPACK_REGISTRATION_OPEN', env('APP_ENV') === 'local'),

    // The route prefix
    'route_prefix' => 'admin',


];
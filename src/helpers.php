<?php

use Creativeorange\Gravatar\Facades\Gravatar;

if (! function_exists('tessa_url')) {
    /**
     * Appends the configured tessa prefix and returns
     * the URL using the standard Laravel helpers.
     *
     * @param $path
     *
     * @param array $parameters
     * @param null $secure
     *
     * @return string
     */
    function tessa_url($path = null, $parameters = [], $secure = null)
    {
        $path = ! $path || (substr($path, 0, 1) == '/') ? $path : '/'.$path;

        return url(config('tessa.base.route_prefix', 'admin').$path, $parameters, $secure);
    }
}

if (! function_exists('tessa_avatar_url')) {
    /**
     * Returns the avatar URL of a user.
     *
     * @param $user
     *
     * @return string
     * @throws \Creativeorange\Gravatar\Exceptions\InvalidEmailException
     */
    function tessa_avatar_url($user)
    {
        $first_letter = $user->getAttribute('name') ? mb_substr($user->name, 0, 1, 'UTF-8') : 'A';

        return Gravatar::fallback("https://placehold.co/120x120/00a65a/ffffff/&text=$first_letter")->get($user->email);
    }
}

if (! function_exists('tessa_view')) {

    function tessa_view($view)
    {
        $theme = 'tessa::';

        return $theme.$view;
    }
}
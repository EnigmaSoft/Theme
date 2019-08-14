<?php

use Enigma\Theme\Theme;


if (! function_exists('theme'))
{
    /**
     * Get the current Theme of the CMS with a optional Page.
     *
     * @param  string  $page
     * @return string
     */
    function theme($page = null, $stringOnly = false)
    {
        return app('theme')->make($page, $stringOnly);
        # return app(Theme::class)->make($page);
    }
}
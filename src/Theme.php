<?php

namespace Enigma\Theme;

use App\Http\Controllers\Controller;

class Theme
{

    public function show()
    {
        return 'Works';
    }

    /**
     * Get the current Theme, with an optional Page.
     *
     * @param  string|null $page
     * @return string
     */
    public function make($page = null, $stringOnly = false)
    {
        $theme = config('enigma.theme.name', 'default');

        if ($page != null)
        {
            $theme = config('enigma.theme.name', 'default').'.'.$page;
        }

        if ($stringOnly)
        {
            return $theme;
        }
        
        return view($theme);
    }

    public static function string($page = null)
    {
        $theme = config('enigma.theme.name', 'default');

        if ($page != null)
        {
            $theme = config('enigma.theme.name', 'default').'.'.$page;
        }
        return $theme;
    }

    public static function __callStatic($method, $parameters)
    {
        return $this->forwardCallTo($this->getView(), $method, $parameters);
    }

    public function __call($method, $parameters)
    {
        return $this->forwardCallTo($this->getView(), $method, $parameters);
    }
}

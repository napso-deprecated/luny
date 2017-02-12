<?php

namespace App\luny;

use Illuminate\View\FileViewFinder;

class ThemeViewFinder extends FileViewFinder
{

    protected $activeTheme;


    public function setActiveTheme($theme)
    {
        // realpath(base_path('resources/views')),

        $this->activeTheme = $theme;
        array_unshift($this->paths, base_path('resources/themes/' . $theme . '/views'));
    }

    public function setHints($hints)
    {
        $this->hints = $hints;
    }


}

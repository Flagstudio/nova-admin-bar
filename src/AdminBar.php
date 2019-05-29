<?php

namespace Flagstudio\NovaAdminBar;

use App\Nova\Freebie;

class AdminBar
{
    public function generate($model)
    {
        Freebie::uriKey();

        return view('NovaAdminBar::bar')->render();
    }
}
<?php

namespace Flagstudio\NovaAdminBar;

use Illuminate\Support\Facades\Facade;

class AdminBarFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'adminbar';
    }
}
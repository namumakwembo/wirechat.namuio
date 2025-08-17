<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class DocsRoute extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'docs-route'; // binding name
    }
}

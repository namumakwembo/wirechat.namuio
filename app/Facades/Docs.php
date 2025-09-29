<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static array versions()
 * @method static string latest()
 * @method static string current()
 * @method static string route(string $name, array $params = [])
 * @method static string viewFolder(string $version = null)
 * @method static bool routeIs(string $name)
 */
class Docs extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'docs';
    }
}

<?php

namespace App\Services;

use Illuminate\Support\Facades\Route;

class Docs
{
    /**
     * Get all versions (view folder => route version)
     */
    public static function versions(): array
    {
        return config('docs.versions', []);
    }

    /**
     * Get the current version (view folder version) based on route/segment
     */
    public static function version(): string
    {
        $current = self::current(); // route version, e.g. "v2"

        return array_search($current, self::versions(), true)
            ?: array_key_first(self::versions());
    }


    /**
     * Get the latest route version
     */
    public static function latest(): string
    {
        $versions = array_values(self::versions());
        return end($versions) ?: '';
    }

    /**
     * Get the current route version from URL
     */
    public static function current(): string
    {
        $segment = request()->segment(2); // /docs/{version}/...
        return in_array($segment, array_values(self::versions()))
            ? $segment
            : self::latest();
    }

    /**
     * Generate a route respecting version
     */
    public static function route(string $name, array $params = []): string
    {
        $current = self::current();
        $routePrefix = $current === self::latest() ? '' : $current;

        return $routePrefix
            ? route("$routePrefix.$name", $params)
            : route($name, $params);
    }

    /**
     * Check if the current route matches a given docs route name.
     * Automatically respects versioning.
     */
    public static function routeIs(string $name): bool
    {
        $current = self::current();
        $routePrefix = $current === self::latest() ? '' : $current;
        $expected = $routePrefix ? "$routePrefix.$name" : $name;

        return request()->routeIs($expected);
    }

    /**
     * Check if a docs route exists (respects versioning).
     */
    public static function hasRoute(string $name): bool
    {
        $current = self::current();
        $routePrefix = $current === self::latest() ? '' : $current;
        $routeName = $routePrefix ? "$routePrefix.$name" : $name;

        return Route::has($routeName);
    }

    /**
     * Get the view folder for a route version
     */
    public static function viewFolder(string $version = null): string
    {
        $version = $version ?? self::current();
        return array_search($version, self::versions()) ?: array_key_first(self::versions());
    }
}

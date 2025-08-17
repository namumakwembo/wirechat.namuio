<?php

namespace App\Services;

class Docs
{
    /**
     * Get all versions (route => view folder)
     */
    public static function versions(): array
    {
        return config('docs.versions', []);
    }

    /**
     * Get the latest version (route key)
     */
    public static function latest(): string
    {
        $versions = array_keys(self::versions());
        if (empty($versions)) return '';

        $latest = $versions[0];
        foreach ($versions as $v) {
            if (version_compare(str_replace('x','', $v), str_replace('x','', $latest), '>')) {
                $latest = $v;
            }
        }

        return $latest;
    }

    /**
     * Get the current version based on the URL segment
     */
    public static function current(): string
    {
        $segment = request()->segment(2); // /docs/{version}/...

        return array_key_exists($segment, self::versions())
            ? $segment
            : self::latest();
    }

    /**
     * Generate a route for the current version automatically.
     * If it's the latest version, no prefix is added.
     */
    public static function route(string $name, array $params = []): string
    {
        $current = self::current();

        // Latest version does not need a prefix
        $routePrefix = $current === self::latest() ? '' : $current;

        $routeName = $routePrefix ? "$routePrefix.$name" : $name;

        return route($routeName, $params);
    }


    /**
     * Check if the current route name matches a given Docs route name
     */
    public static function routeIs(string $name): bool
    {
        $current = self::current();

        // Latest version has no prefix
        $routePrefix = $current === self::latest() ? '' : $current;

        $expected = $routePrefix ? "$routePrefix.$name" : $name;

        return request()->routeIs($expected);
    }


    /**
     * Get the view folder for the current version
     */
    public static function viewFolder(string $version = null): string
    {
        $version = $version ?? self::current();

        return self::versions()[$version] ?? self::versions()[self::latest()] ?? '';
    }
}

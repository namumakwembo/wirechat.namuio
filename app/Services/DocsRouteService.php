<?php

namespace App\Services;

use Illuminate\Support\Facades\Route;
use Laravel\Folio\Folio;

class DocsRouteService
{
    public function route($name, $parameters = [], $absolute = true)
    {
        // Get version from URL segment(2) or default to latest
        $urlVersion = request()->segment(2);
        $version = $this->resolveVersion($urlVersion);

        // Use unprefixed route name for latest version, prefixed for others
        $routeName = $version === 'latest' ? $name : "v{$version}.{$name}";

        // Generate the route URL, falling back to unprefixed if versioned route doesn't exist
        return Route::getRoutes()->getByName($routeName)
            ? route($routeName, $parameters, $absolute)
            : route($name, $parameters, $absolute);
    }

    public function isActive($name)
    {
        // Get version from URL segment(2) or default to latest
        $urlVersion = request()->segment(2);
        $version = $this->resolveVersion($urlVersion);

        // Check if the current route matches
        $routeName = $version === 'latest' ? $name : "v{$version}.{$name}";
        return request()->routeIs($routeName) || request()->routeIs($name);
    }

    protected function resolveVersion($urlVersion)
    {
        // Get all mounted paths from Folio
        $mountPaths = Folio::mountPaths();

        // Extract versions from paths with baseUri starting with '/docs'
        $versions = collect($mountPaths)
            ->filter(function ($mountPath) {
                return str_starts_with($mountPath->baseUri, '/docs') && $mountPath->baseUri !== '/docs';
            })
            ->map(function ($mountPath) {
                // Extract version (e.g., '0.2x' from '/docs/0.2x')
                return str_replace('/docs/', '', $mountPath->baseUri);
            })
            ->values()
            ->toArray();

        // If URL version is provided and exists in mounted paths, use it
        if ($urlVersion && in_array($urlVersion, $versions)) {
            return str_replace('.', '', $urlVersion); // Normalize '0.2x' to '02x'
        }

        // Sort versions to find the latest (e.g., '0.3x' > '0.2x')
        if (!empty($versions)) {
            usort($versions, function ($a, $b) {
                return version_compare($b, $a); // Higher version first
            });
            return str_replace('.', '', $versions[0]); // Use latest version (e.g., '03x')
        }

        // Default to 'latest' if no versions found
        return 'latest';
    }
}

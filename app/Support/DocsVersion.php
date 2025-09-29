<?php

namespace App\Support;

class DocsVersion
{
    protected string $routeVersion;

    public function __construct(string $routeVersion)
    {
        $this->routeVersion = $routeVersion;
    }

    /**
     * Get the route version prefix for routes.
     * Returns '' if this version is the latest.
     */
    public function getRouteVersion(): string
    {
        $versions = array_values(config('docs.versions', []));
        if (empty($versions)) return $this->routeVersion;

        $latest = end($versions); // last added version as latest
        return $this->routeVersion === $latest ? '' : $this->routeVersion;
    }

    /**
     * Get the corresponding view folder for this version.
     */
    public function getViewFolder(): string
    {
        $versions = config('docs.versions', []);

        // array_search returns the key (folder) for the route version
        $folder = array_search($this->routeVersion, $versions);

        // fallback to latest folder if not found
        if (!$folder) {
            $folder = array_key_first($versions);
        }

        return $folder;
    }
}

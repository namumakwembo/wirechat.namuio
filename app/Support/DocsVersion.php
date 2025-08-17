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
        $versions = array_keys(config('docs.versions', []));
        if (empty($versions)) return $this->routeVersion;

        $latest = $versions[0];
        foreach ($versions as $v) {
            if (version_compare(str_replace('x','', $v), str_replace('x','', $latest), '>')) {
                $latest = $v;
            }
        }

        return $this->routeVersion === $latest ? '' : $this->routeVersion;
    }

    /**
     * Get the corresponding view folder for this version.
     */
    public function getViewFolder(): string
    {
        return config("docs.versions.{$this->routeVersion}", '0_3x'); // fallback to latest folder
    }
}

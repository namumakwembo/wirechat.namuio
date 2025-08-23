<?php

/*
|--------------------------------------------------------------------------
| Docs Version Mapping
|--------------------------------------------------------------------------
|
| This mapping connects your route versions (used in URLs) to the
| corresponding view folders (used for Blade templates).
|
| Structure:
| 'route version' => 'view folder version'
|
| Example:
| '0.3x' => '0_3x'
| - The key is used in the URL prefix for routes.
|   Example URL: /docs/0.3x/installation
|
| - The value is the folder name under resources/views/docs/.
|   Example view: resources/views/docs/0_3x/installation.blade.php
|
| Benefits:
| 1. Dynamically determine the latest version.
| 2. Keep routes and views in sync without hardcoding.
| 3. Maintain separate routes and views for older versions.
|
| Notes:
| - Route versions (keys) can contain dots; view folder versions
|   (values) should avoid dots for safe folder naming.
| - Always add new versions at the end to ensure proper version
|   comparison when determining the latest version.
*/

return [
    'versions' => [
        '0_2x' => '0.2x',
        '0_3x' => '0.3x',
    ],
];

<?php

/*
|--------------------------------------------------------------------------
| Docs Version Mapping
|--------------------------------------------------------------------------
|
| 'route version' => 'view folder version'
|
| - The key (route version) is used in the URL prefix for routes.
|   Example: '0.3x' → /docs/0.3x/installation
|
| - The value (view version) is the folder name in your views.
|   Example: '0_3x' → resources/views/docs/0_3x/installation.blade.php
|
| Using this mapping ensures:
| 1. You can determine the latest version dynamically.
| 2. Your routes and views stay in sync without hardcoding.
| 3. Older versions keep their own routes and views.
*/

return [
    'versions' => [
        '0.1x' => '0_1x',
        '0.2x' => '0_2x',
        '0.3x' => '0_3x',
    ],
];

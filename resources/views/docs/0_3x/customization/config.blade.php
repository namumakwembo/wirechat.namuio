@php

use function Laravel\Folio\name;


name('docs.customization.config');



@endphp
<x-docs-layout>

<x-markdown>
# Configuration

Wirechat offers a variety of customization options through its configuration file. You can adjust settings such as themes, routes, and features to better suit your needs.

To publish the configuration file, run the following command:

```bash
php artisan vendor:publish --tag=wirechat-config
```

`config/wirechat.php`

```

return [

    /*
    |--------------------------------------------------------------------------
    | Use UUIDs for Conversations
    |--------------------------------------------------------------------------
    |
    | Determines the primary key type for the conversations table and related
    | relationships. When enabled, UUIDs (version 7 if supported, otherwise
    | version 4) will be used during initial migrations.
    |
    | ⚠️ This setting is intended for **new applications only** and does not
    | affect how new conversations are created at runtime. It controls whether
    | migrations generate UUID-based keys or unsigned big integers.
    |
    */
    'uses_uuid_for_conversations' => false,

    /*
    |--------------------------------------------------------------------------
    | Table Prefix
    |--------------------------------------------------------------------------
    |
    | This value will be prefixed to all Wirechat-related database tables.
    | Useful if you're sharing a database with other apps or packages.
    | ⚠️ This setting is intended for **new applications only**
    |
    */
    'table_prefix' => 'wirechat_',

    /*
     |--------------------------------------------------------------------------
     | Storage
     |--------------------------------------------------------------------------
     |
     | Global configuration for WireChat file storage. Defines the disk,
     | directory, and visibility used for saving attachments.
     |
     */
    'storage' => [
        'disk' => 'public',
        'visibility' => 'public',
        'directories' => [
          'attachments' => 'attachments',
        ],
    ],

];


```



</x-markdown>

</x-docs-layout>

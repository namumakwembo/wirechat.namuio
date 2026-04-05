@php

use function Laravel\Folio\name;

name('docs.customization.config');

@endphp
<x-docs-layout>

<x-markdown>
# Configuration

Wirechat exposes a small global configuration file for package-level defaults.
These settings are intentionally limited to the values that must stay consistent across the entire package,
such as table naming, storage behavior, and the model classes Wirechat should resolve internally.

To publish the configuration file, run the following command:

```bash
php artisan vendor:publish --tag=wirechat-config
```

After publishing, you will find the file at:

`config/wirechat.php`

```php
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
    | This setting is intended for new applications only.
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
    | This setting is intended for new applications only.
    |
    */
    'table_prefix' => 'wirechat_',

    'models' => [
        'action' => \Wirechat\Wirechat\Models\Action::class,
        'attachment' => \Wirechat\Wirechat\Models\Attachment::class,
        'conversation' => \Wirechat\Wirechat\Models\Conversation::class,
        'group' => \Wirechat\Wirechat\Models\Group::class,
        'message' => \Wirechat\Wirechat\Models\Message::class,
        'participant' => \Wirechat\Wirechat\Models\Participant::class,
    ],

    /*
     |--------------------------------------------------------------------------
     | Storage
     |--------------------------------------------------------------------------
     |
     | Global configuration for Wirechat file storage. Defines the disk,
     | directory, and visibility used for saving attachments.
     |
     */
    'storage' => [
        'disk' => env('WIRECHAT_STORAGE_DISK', 'public'),
        'visibility' => 'public',
        'directories' => [
            'attachments' => 'attachments',
        ],
    ],

    /*
     |--------------------------------------------------------------------------
     | Links
     |--------------------------------------------------------------------------
     |
     | Controls how message links are detected and normalized. These settings
     | power linkified message rendering and link-type detection.
     |
     */
    'message_links' => [
        // Allow domains like "example.com" without http/https.
        'allow_bare_domains' => true,

        // Limit recognized TLDs for bare domains.
        'allowed_tlds' => [
            'com', 'net', 'org', 'io', 'co', 'me', 'app', 'dev', 'ai', 'gg', 'tv',
            'info', 'biz', 'xyz', 'site', 'store', 'shop', 'pro', 'cloud',
        ],
    ],
];
```

---

<x-section-heading label="UUID Conversations" />

Use `uses_uuid_for_conversations` only when starting a fresh Wirechat installation.
This affects migrations and relationship key types for conversations.

```php
'uses_uuid_for_conversations' => true,
```

Do not flip this on in an existing installation unless you are also handling a migration strategy for existing data.

---

<x-section-heading label="Table Prefix" />

Use `table_prefix` when you want Wirechat tables to live beside other package tables or legacy application tables.

```php
'table_prefix' => 'wirechat_',
```

Because model table names, migrations, scopes, and jobs all rely on these table names being stable,
this should also be treated as an initial-install decision.

---

<x-section-heading label="Models" />

Wirechat supports resolving its internal models from config.
That means you can point the package at your own model classes while still keeping Wirechat's built-in behavior and relationships.

```php
'models' => [
    'action' => \Wirechat\Wirechat\Models\Action::class,
    'attachment' => \Wirechat\Wirechat\Models\Attachment::class,
    'conversation' => \Wirechat\Wirechat\Models\Conversation::class,
    'group' => \Wirechat\Wirechat\Models\Group::class,
    'message' => \Wirechat\Wirechat\Models\Message::class,
    'participant' => \Wirechat\Wirechat\Models\Participant::class,
],
```

Each configured class must extend the matching base Wirechat model.
Wirechat validates that at runtime before using the class.

For example, you may replace the message model with your own subclass:

```php
namespace App\Models;

use Wirechat\Wirechat\Enums\MessageType;
use Wirechat\Wirechat\Models\Message as BaseMessage;

class WirechatMessage extends BaseMessage
{
    protected $casts = [
        'type' => MessageType::class,
        'kept_at' => 'datetime',
        'edited_at' => 'datetime',
    ];
}
```

Then point the package to it:

```php
'models' => [
    'message' => \App\Models\WirechatMessage::class,
],
```

The custom class can live directly in `App\Models`; it does not need a dedicated `App\Models\Wirechat` namespace.

Use this when you want to:

- Add app-specific relationships.
- Add custom accessors or helper methods.
- Add your own casts or domain-level logic.
- Attach observers, scopes, or traits in a subclass.

Do not use this feature to replace the schema contract casually.
If you swap models, Wirechat still expects the package tables and core columns to exist unless you are intentionally taking ownership of the full package data layer.

If you want a full explanation of each model, see the [Models]({{ docs()->route('customization.models') }}) page.

---

<x-section-heading label="Storage" />

Wirechat storage settings are global on purpose.
Attachments, generated URLs, cleanup behavior, and download handling all rely on the same disk and visibility rules.

```php
'storage' => [
    'disk' => env('WIRECHAT_STORAGE_DISK', 'public'),
    'visibility' => 'public',
    'directories' => [
        'attachments' => 'attachments',
    ],
],
```

Use these values to define:

- Which filesystem disk stores uploaded files.
- Whether URLs should be public or temporary/private.
- Which directory attachments are written into.

This configuration is package-wide rather than panel-specific so background jobs, model accessors, downloads, and cleanup all behave consistently.

---

<x-section-heading label="Links" />

Wirechat can parse URLs in message bodies and mark messages as link-type based on their content.
These settings control how URLs and bare domains are recognized.

```php
'message_links' => [
    'allow_bare_domains' => true,
    'allowed_tlds' => [
        'com', 'net', 'org', 'io', 'co', 'me', 'app', 'dev', 'ai', 'gg', 'tv',
        'info', 'biz', 'xyz', 'site', 'store', 'shop', 'pro', 'cloud',
    ],
],
```

Use `allow_bare_domains` to let `example.com` be recognized without `http://` or `https://`.
Use `allowed_tlds` to restrict recognized bare domains. Override the array with your own list
to tighten or expand what counts as a link.

</x-markdown>

<x-slot name="subNavigation">
    <x-sub-navigation :items="[
        'Configuration',
        'UUID Conversations',
        'Table Prefix',
        'Models',
        'Storage',
        'Links',
    ]"/>
</x-slot>

</x-docs-layout>

<x-docs-layout>

<x-markdown>
# WireChat Panel Configuration

WireChat panels centralize configuration for routing, middleware, features, and search functionality in a single file, streamlining package setup.

## Default Panel Setup

When you install WireChat, a default panel is created at `/chats`, defined in `app/Providers/WireChat/ChatsPanelProvider.php`.

<x-section-heading label="Creating Additional Panels" />

You can create multiple panels to support different user roles, such as:
- Admins accessing exclusive features at `/admin`.
- Regular users accessing chats at `/chats`.

To create a new panel, run:

```bash
php artisan make:wirechat-panel panel-name
```

For example, `php artisan make:wirechat-panel app` generates a panel named "app" with its configuration in `app/Providers/WireChat/AppPanelProvider.php`. The panel is accessible at `/app` by default, but you can customize the path (see [Changing the Panel Path](#path)).

After creating a panel, register its service provider:
- Laravel 11+: Add to `bootstrap/providers.php`.
- Laravel 10 or below: Add to `config/app.php`.

WireChat attempts automatic registration, but if the panel is inaccessible, verify the provider registration.

<x-section-heading label="Panel ID" />

The panel ID identifies the panel across the application. Set it using the `id()` method:

```php
use Namu\WireChat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        ->id('chats');
}
```

<x-section-heading label="Path" />

Customize the panel’s URL path using the `path()` method:

```php
use Namu\WireChat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        ->path('chats');
}
```

To use the root URL (no prefix), set an empty path:

```php
use Namu\WireChat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        ->path('');
}
```

**Note**: Ensure `routes/web.php` does not define a conflicting `''` or `'/'` route, as it takes precedence.

<x-section-heading label="Middleware" />

Apply additional middleware to WireChat routes using the `middleware()` method:

```php
use Namu\WireChat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        ->middleware(['web', 'auth']);
}
```

<x-section-heading label="Chat Middleware" />

The `belongsToConversation` middleware is automatically applied to `/chats/{conversation}` to restrict access to authorized users, such as conversation members. Add custom middleware to modify chat access:

```php
use Namu\WireChat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        ->chatMiddleware([
            // Additional middleware
        ]);
}
```

<x-section-heading label="Enable Chats Search" />

Enable the chat search field in the WireChat UI:

```php
use Namu\WireChat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        ->chatsSearch();
}
```

**Note:** Disable search by passing `false`: `->chatsSearch(false)`.

<x-section-heading label="Web Push Notifications" />

WireChat web push notifications keep you connected to conversations via browser notifications, even when the app is not active:

```php
use Namu\WireChat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        ->webPushNotifications();
}
```

**Note:** Disable notifications by passing `false`: `->webPushNotifications(false)`.

<x-section-heading label="Layout" />

WireChat uses the default layout `wirechat::layouts.app`. Override it with a custom layout:

```php
use Namu\WireChat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        ->layout('layouts.app');
}
```

<x-section-heading label="Attachments" />

Enable both file and media attachments:

```php
use Namu\WireChat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        ->attachments();
}
```

Setting to `false` disables attachments entirely: `->attachments(false)`.

<x-section-heading label="File Attachments" />

Allow only document uploads (e.g., PDFs, ZIPs, text files):

```php
use Namu\WireChat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        ->fileAttachments();
}
```

<x-section-heading label="Media Attachments" />

Allow only image and video uploads:

```php
use Namu\WireChat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        ->mediaAttachments();
}
```

<x-section-heading label="Heading" />

Set a custom heading for the chat panel:

```php
use Namu\WireChat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        ->heading('Chats');
}
```

</x-markdown>

</x-docs-layout>

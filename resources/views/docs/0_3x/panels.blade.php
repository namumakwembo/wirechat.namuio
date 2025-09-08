<x-docs-layout>

<x-markdown>
# WireChat Panel Configuration

WireChat panels centralize configuration for routing, middleware, features, and search functionality in a single file, streamlining package setup.

<x-section-heading label="Default Panel Setup" />

When you install WireChat, a default panel is created at `app/Providers/WireChat/ChatsPanelProvider.php` and the wirechat can accessed at route `'/chats'`.

<x-section-heading label="Creating Panels" />

You can create multiple panels to support different user roles, such as:
- Admins accessing exclusive features at `/admin`.
- Regular users accessing chats at `/chats`.

To create a new panel, run:

```bash
php artisan make:wirechat-panel panel-name
```

For example, `php artisan make:wirechat-panel app` generates a panel named "app" with its configuration in `app/Providers/WireChat/AppPanelProvider.php`. The panel is accessible at `'/app'` by default, but you can customize the path (see [Changing the Panel Path](#path)).

After creating a panel, register its service provider:
- Laravel 11+: Add to `bootstrap/providers.php`.
- Laravel 10 or below: Add to `config/app.php`.

WireChat attempts automatic registration, but if the panel is inaccessible, verify the provider registration.

<x-section-heading label="Methods" />

<x-sub-section-heading label="Panel ID" />

The panel ID identifies the panel across the application. Set it using the `id()` method:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->id('chats');
}
```

<x-sub-section-heading label="Path" />

Customize the panel’s URL path using the `path()` method:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->path('chats');
}
```

To use the root URL (no prefix), set an empty path:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->path('');
}
```

**Note**: Ensure `routes/web.php` does not define a conflicting `''` or `'/'` route, as it takes precedence.

<x-sub-section-heading label="Middleware" />

Apply additional middleware to WireChat routes using the `middleware()` method:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->middleware(['web', 'auth']);
}
```

<x-sub-section-heading label="Chat Middleware" />

The `belongsToConversation` middleware is automatically applied to `/chats/{conversation}` to restrict access to authorized users, such as conversation members. Add custom middleware to modify chat access:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->chatMiddleware([
            // Additional middleware
        ]);
}
```

<x-sub-section-heading label="Enable Chats Search" />

Enable the chat search field in the WireChat UI:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->chatsSearch();
}
```
 **Note:** Disable search by passing `false`: `->chatsSearch(false)`.


<x-sub-section-heading label="Enable Emoji Picker" />

Enable Emoji Picker element in Chat

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->emojiPicker();
}
```

By default the emoji picker has position  `floating`. You can change it to `docked` using the enum:

```php
use Wirechat\Wirechat\Panel;
use Wirechat\Wirechat\Support\Enums\EmojiPickerPosition;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->emojiPicker(position:EmojiPickerPosition::Docked);
}
```


<x-sub-section-heading label="Web Push Notifications" />

WireChat web push notifications keep you connected to conversations via browser notifications, even when the app is not active:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->webPushNotifications();
}
```
**Note:** Disable notifications by passing `false`: `->webPushNotifications(false)`.

<x-sub-section-heading label="Messages Queue" />

High Priority (`messages`): For real-time broadcasting of messages to users in a conversation.

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->messagesQueue('messages');
}
```
<x-sub-section-heading label="Events Queue" />

Default Priority (`default`): For notifications like updating chat lists or showing unread message counts.
```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->eventsQueue('default');
}
```


<x-sub-section-heading label="Layout" />

WireChat uses the default layout `wirechat::layouts.app`. Override it with a custom layout:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->layout('layouts.app');
}
```

<x-sub-section-heading label="Attachments" />

Enable both file and media attachments:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->attachments();
}
```

Setting to `false` disables attachments entirely: `->attachments(false)`.

<x-sub-section-heading label="File Attachments" />

Allow only document uploads (e.g., PDFs, ZIPs, text files):

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->fileAttachments();
}
```

<x-sub-section-heading label="Media Attachments" />

Allow only image and video uploads:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->mediaAttachments();
}
```
<x-sub-section-heading label="Color theme" />

Easily update the panel’s primary color so it aligns with your brand colors.
```php
use Wirechat\Wirechat\Panel;
use Wirechat\Wirechat\Support\Color;

public function panel(Panel $panel): Panel
{
return $panel
    // ...
    ->colors([
        'primary' => Color::Blue
    ]);
}
````

<x-sub-section-heading label="Heading" />

Set a custom heading for the chat panel:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
   return $panel
      //...
      ->heading('Chats');
}
```

<x-sub-section-heading label="Favicon" />

Customize the chat panel with a favicon that reflects your brand.

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
   return $panel
      //...
      ->favicon(url:asset('favicon.ico'));
}
```

<x-sub-section-heading label="Create Chat Action" />

Make the create create chat button action visible on WireChat UI.

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->createChatAction();
}
```

<x-sub-section-heading label="Create Group Action" />

Show the create create group action.

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->createGroupAction();
}
```

<x-sub-section-heading label="Redirect To Home Action" />

Show the create new group action

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->redirectToHomeAction();
}
```

<x-sub-section-heading label="HomeUrl" />

Set the redirect url when the home action is clicked

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->homeUrl('/dashboard');
}
```



</x-markdown>
    <x-slot name="subNavigation">
        <x-sub-navigation :items="[
            'Default Panel Setup',
            'Creating Panels',
            'Methods' => [
                'Panel ID',
                'Path',
                'Middleware',
                'Chat Middleware',
                'Enable Chats Search',
                'Enable Emoji Picker',
                'Web Push Notifications',
                'Messages Queue',
                'Events Queue',
                'Layout',
                'Attachments',
                'File Attachments',
                'Media Attachments',
                'Color theme',
                'Heading',
                'Favicon',
                'Create Chat Action',
                'Create Group Action',
                'Redirect To Home Action',
                'HomeUrl',
            ],


        ]" />
    </x-slot>

</x-docs-layout>

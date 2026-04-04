<x-docs-layout>

<x-markdown>
# Wirechat Panel Configuration

Wirechat panels centralize configuration for routing, middleware, features, and search functionality in a single file, streamlining package setup.

<x-section-heading label="Default Panel Setup" />

When you install Wirechat, a default panel is created at `app/Providers/Wirechat/ChatsPanelProvider.php` and the wirechat can accessed at route `'/chats'`.

<x-section-heading label="Creating Panels" />

You can create multiple panels to support different user roles, such as:
- Admins accessing exclusive features at `/admin`.
- Regular users accessing chats at `/chats`.

To create a new panel, run:

```bash
php artisan make:wirechat-panel panel-name
```

For example, `php artisan make:wirechat-panel app` generates a panel named "app" with its configuration in `app/Providers/Wirechat/AppPanelProvider.php`. The panel is accessible at `'/app'` by default, but you can customize the path (see [Changing the Panel Path](#path)).

After creating a panel, register its service provider:
- Laravel 11+: Add to `bootstrap/providers.php`.
- Laravel 10 or below: Add to `config/app.php`.

Wirechat attempts automatic registration, but if the panel is inaccessible, verify the provider registration.

<x-section-heading label="Panel Methods Overview" />

Panels are the main configuration surface for Wirechat. Instead of scattering package setup across multiple files, you can keep routing, access rules, visual settings, chat-list behavior, and feature flags in one provider.

Common panel method groups include:

- **Identity and routing:** `id()`, `path()`, `default()`
- **Access and middleware:** `middleware()`, `chatMiddleware()`
- **Chats list behavior:** `chatsSearch()`, `unreadIndicator()`
- **Uploads and media:** `attachments()`, `fileAttachments()`, `mediaAttachments()`
- **Appearance:** `layout()`, `colors()`, `heading()`, `favicon()`, `emojiPicker()`
- **Message rendering:** `linkifyMessages()`
- **Actions:** `createChatAction()`, `createGroupAction()`, `clearChatAction()`, `deleteChatAction()`, `redirectToHomeAction()`, `deleteMessageActions()`
- **Pro features:** `tabs()`, `defaultTab()`, `contentViewer()`

Use the methods below when you want fine-grained control, or start with a broader provider example and refine it over time.

<x-section-heading label="Quick Example" />

Here is a realistic panel provider example that combines some of the most commonly used panel methods:

```php
use Wirechat\Wirechat\Panel;
use Wirechat\Wirechat\Support\Color;
use Wirechat\Wirechat\Support\Enums\EmojiPickerPosition;
use Wirechat\Wirechat\Support\Enums\UnreadIndicatorType;

public function panel(Panel $panel): Panel
{
    return $panel
        ->id('support')
        ->path('support')
        ->middleware(['web', 'auth'])
        ->chatMiddleware(['verified'])
        ->chatsSearch()
        ->unreadIndicator(type: UnreadIndicatorType::Count)
        ->emojiPicker(position: EmojiPickerPosition::Docked)
        ->attachments()
        ->colors([
            'primary' => Color::Blue,
        ])
        ->heading('Support Chat')
        ->createChatAction()
        ->createGroupAction()
        ->redirectToHomeAction(url: '/dashboard')
        ->default();
}
```

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

Apply additional middleware to Wirechat routes using the `middleware()` method:

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

Enable the chat search field in the Wirechat UI:

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

<x-sub-section-heading label="Linkify Messages" />

Enable message link parsing so URLs and recognized bare domains (like `example.com`) render as clickable links inside chat bubbles:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->linkifyMessages();
}
```

Disable it explicitly by passing `false`:

```php
->linkifyMessages(false);
```

This feature is off by default. It only wraps the URL segments, leaving the rest of the message body unchanged. Link recognition respects the `wirechat.links` config settings.

You can tune link recognition globally in `config/wirechat.php`:

```php
'links' => [
    // Allow domains like "example.com" without http/https.
    'allow_bare_domains' => true,

    // Limit recognized TLDs for bare domains. Set to null to use Wirechat's defaults.
    'allowed_tlds' => null,
],
```

<x-sub-section-heading label="Unread Messages Indicator" />

Use `unreadIndicator()` to control how unread conversations are highlighted in the chats list.

By default, Wirechat uses a small unread dot, so existing panels keep the current behavior without needing any changes:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->unreadIndicator();
}
```

If you prefer a numeric unread badge, pass the `UnreadIndicatorType` enum:

```php
use Wirechat\Wirechat\Panel;
use Wirechat\Wirechat\Support\Enums\UnreadIndicatorType;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->unreadIndicator(type: UnreadIndicatorType::Count);
}
```

You may also disable the unread indicator completely:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->unreadIndicator(false);
}
```

This setting affects the chats list in both full-page and widget mode.

If you are upgrading from earlier panel examples, `unReadMessages()` still works as a backward-compatible alias, but `unreadIndicator()` is now the preferred name.

<x-sub-section-heading label="Conversation Tabs" />

Organize the chats list into focused views such as **All**, **Unread**, or **Groups**.

**Pro:** Conversation tabs are available in Wirechat Pro. See the [Tabs]({{ docs()->route('usage.tabs') }}) page for the full API and examples.

```php
use Wirechat\Wirechat\Panel;
use Wirechat\Wirechat\Support\Tabs\Tab;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->tabs(
              Tab::make('all'),
              Tab::make('groups')->count(),
          )
          ->defaultTab('all');
}
```


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

Wirechat web push notifications keep you connected to conversations via browser notifications, even when the app is not active:

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

Wirechat uses the default layout `wirechat::layouts.app`. Override it with a custom layout:

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

<x-sub-section-heading label="Content Viewer" />

Browse shared media, documents, and links from a conversation-level viewer inside the chat details panel.

**Pro:** Content Viewer is available in Wirechat Pro. See the [Content Viewer]({{ docs()->route('usage.content-viewer') }}) page for the full guide.

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
          //...
          ->contentViewer();
}
```

Pass `false` to disable it: `->contentViewer(false)`.

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
```

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

<x-sub-section-heading label="Actions" />

Wirechat panel actions let you control shortcuts such as creating chats, creating groups, clearing chats, deleting chats, returning home, and deleting messages.

For full action documentation, including `icon` and icon-attribute configuration, see the [Actions]({{ docs()->route('actions') }}) page.

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        //...
        ->createChatAction()
        ->createGroupAction()
        ->clearChatAction()
        ->deleteChatAction()
        ->redirectToHomeAction(url: '/dashboard')
        ->deleteMessageActions();
}
```



</x-markdown>
    <x-slot name="subNavigation">
        <x-sub-navigation :items="[
            'Default Panel Setup',
            'Creating Panels',
            'Panel Methods Overview',
            'Quick Example',
            'Methods' => [
                'Panel ID',
                'Path',
                'Middleware',
                'Chat Middleware',
                'Enable Chats Search',
                'Unread Messages Indicator',
                'Conversation Tabs',
                'Enable Emoji Picker',
                'Web Push Notifications',
                'Messages Queue',
                'Events Queue',
                'Layout',
                'Attachments',
                'File Attachments',
                'Media Attachments',
                'Content Viewer',
                'Color theme',
                'Heading',
                'Favicon',
                'Actions'
            ],


        ]" />
    </x-slot>

</x-docs-layout>

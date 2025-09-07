
<x-docs-layout>

<x-markdown>

# Authorization

Panels offer flexible integration with multiple guards and middleware configurations to secure your application’s routes and broadcasting channels. This guide will help you set up and manage these configurations in a simple and clear manner.

---

<x-section-heading label="Guards" />

**Guards** determine how users are authenticated for each request. Laravel supports multiple guards, which you can configure via panels.

### Default Guard Setup

A panel can define a single guard:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
            //..
            ->guards(['web']);
}
````

No additional setup is needed if you are using the default `web` guard.

### Using Multiple Guards

If your application uses multiple guards, such as `admin` and `web`, you can chain them in the panel:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
            //..
            ->guards(['web', 'admin']);
}
```

This allows users authenticated via any listed guard to access the panel’s routes and private channels.

---

<x-section-heading label="Middleware" />

**Middleware** authenticates users when they subscribe to channels or access panel routes, such as `/chats` or conversation-specific pages.

<x-sub-section-heading label="Default Middleware Setup" key="Default Middleware Setup" />

Panels automatically apply the `belongsToConversation` middleware to conversation routes. You can also define additional middleware for the panel:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
            //..
            ->middleware(['web', 'auth']);
}
```

<x-sub-section-heading label="Multi-Guard Authentication" />

For multiple guards, the middleware should handle all of them:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
            //..
            ->middleware(['web', 'auth:admin,web'])
            ->guards(['web', 'admin']);
}
```
---
<x-sub-section-heading label="Chat Middleware" />

By default, the `belongsToConversation` middleware is automatically applied to the `/chats/{conversation}` route.
This ensures that only authorized users, such as conversation members, can access the chat.

If you want to adjust or extend how chats are viewed or accessed, you may register additional middleware here:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->chatMiddleware([
            // Your custom middleware
        ]);
}
````

With this setup, your conversation routes remain secure under a variety of authentication setups.

<x-sub-section-heading label="Using the `belongsToConversation` Middleware" />

The `belongsToConversation` middleware is **automatically applied** to the default chat view routes, such as `/chat/{id}` . This ensures that users can only access conversations they are part of.

However, if you decide to use the chat component **independently** of the default routes—like embedding it on a custom page—you must manually apply the `belongsToConversation` middleware to your route. This guarantees that only authorized participants can access the conversation.

```php
use Illuminate\Support\Facades\Route;

Route::get('/custom/{id}', function ($id) {
            return view('custom', ['id' => $id]);
         })->middleware(['web', 'auth', 'belongsToConversation']);
```

Then in Blade:

@verbatim

```blade
<livewire:wirechat.chat :conversation="$id" />
```
@endverbatim

By adding the middleware, you ensure your custom routes maintain the same access control as the default chat routes.

---

<x-section-heading label="Broadcasting Middleware Configuration" />

Panel guards and middleware should match your `BroadcastServiceProvider` settings to avoid conflicts:

```php
// app/Providers/BroadcastServiceProvider.php

Broadcast::routes([
    'middleware' => ['web', 'auth:admin,web'],
    'guards' => ['web', 'admin'],
]);
```

**Key Points:**
- **Consistency**: Ensure that the `guards` and `middleware` defined in `BroadcastServiceProvider` match those in Wirechat's configuration.
- **Avoid Conflicts**: Inconsistent settings can cause users to be improperly authenticated, leading to access issues.

</x-markdown>

<x-slot name="subNavigation">


<x-sub-navigation :items="['Guards',
'Middleware'=>[
'Default Middleware Setup',
'Multi-Guard Authentication',
'Chat Middleware',
'Using the belongsToConversation Middleware',
],
'Broadcasting Middleware Configuration']"/>


</x-slot>

</x-docs-layout>

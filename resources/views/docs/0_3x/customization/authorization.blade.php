
<x-docs-layout>

<x-markdown>

# Authorization

Panels offer flexible integration with multiple guards and middleware configurations to secure your application’s routes and broadcasting channels. This guide will help you set up and manage these configurations in a simple and clear manner.

---

<x-section-heading label="Panel Access Authorization" />

Control which users can access specific panels by implementing the `canAccessWirechatPanel()` method in your User model.

### Basic Implementation

```php
namespace App\Models;

use Wirechat\Wirechat\Contracts\WirechatUser;
use Wirechat\Wirechat\Panel;

class User extends Authenticatable implements WirechatUser
{
    public function canAccessWirechatPanel(Panel $panel): bool
    {
        // Example: Only verified users can access
        return $this->hasVerifiedEmail();
    }
}
```

### Checking by Panel ID

When using multiple panels, check access based on the panel's ID in your Model:

```php
public function canAccessWirechatPanel(Panel $panel): bool
{
    $panelId = $panel->getId();

    return match($panelId) {
        'admin' => $this->is_admin,
        'support' => $this->hasRole('support'),
        default => $this->hasVerifiedEmail(),
    };
}
```

You set the panel ID when registering your panel:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
         ->id('admin') // Define panel ID here
         ->path('admin/chat')
}
```

<x-section-heading label="Model Authorization" />

Beyond panel access, you can fine-tune who gets to create chats and groups. Think of these as the bouncers at the door of your chat features.

<x-sub-section-heading label="Controlling 1-to-1 Chat Creation" />

Want to prevent spam or limit who can start conversations? This is your friend:

```php
public function canCreateChats(): bool
{
    // Only verified users can slide into DMs
    return $this->hasVerifiedEmail();
}
```

Or get creative with your business logic:

```php
public function canCreateChats(): bool
{
    // Prevent users from creating too many chats
    if ($this->conversations()->count() >= 100) {
        return false; // Slow down there, chatty!
    }

    // New users need to wait 24 hours (anti-spam measure)
    if ($this->created_at->gt(now()->subDay())) {
        return false;
    }

    return $this->hasVerifiedEmail();
}
```

<x-sub-section-heading label="Controlling Group Creation" />

Groups are where the magic happens—but they're also a premium feature opportunity:

```php
public function canCreateGroups(): bool
{
    // Premium feature: only paid users can create groups
    return $this->subscription?->active === true;
}
```

Mix and match your requirements:

```php
public function canCreateGroups(): bool
{
    // Must be verified AND either premium or admin
    return $this->hasVerifiedEmail() && 
           ($this->is_premium || $this->hasRole('admin'));
}
```

Or implement reputation-based access:

```php
public function canCreateGroups(): bool
{
    // Trusted users with good reputation can create groups
    return $this->reputation_score >= 50 && 
           $this->account_age_days >= 30;
}
```

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


<x-sub-navigation :items="[
'Panel Access Authorization',
'Model Authorization'=>[
'Controlling 1-to-1 Chat Creation',
'Controlling Group Creation',
],
'Guards',
'Middleware'=>[
'Default Middleware Setup',
'Multi-Guard Authentication',
'Chat Middleware',
'Using the belongsToConversation Middleware',
],
'Broadcasting Middleware Configuration',
]"/>


</x-slot>

</x-docs-layout>

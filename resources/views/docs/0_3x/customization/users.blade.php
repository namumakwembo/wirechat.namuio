<x-docs-layout>

<x-markdown>

# Introduction

WireChat allows you to define how users are represented within your application.
You can configure attributes such as display names, profile avatars, and profile URLs to provide a consistent experience across conversations and components.

---

<x-section-heading label="Panel access" />

To decide which users can open a WireChat panel, you may implement your own authorization logic inside the `User` model.
WireChat will call the `canAccessWireChatPanel()` method whenever a panel is being accessed via a route.

```php{}{11-16}
namespace App\Models;

use Namu\WireChat\Panel;
use Namu\WireChat\Traits\InteractsWithWireChat;
use Namu\WireChat\Contracts\WireChatUser;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements WireChatUser
{
    use InteractsWithWireChat;
    // ...

    public function canAccessWireChatPanel(Panel $panel): bool
    {
        return $this->hasVerifiedEmail();
    }
}

````

The `canAccessWireChatPanel()` method should return `true` or `false` depending on whether the user is allowed to enter the given `$panel`.
In this example, access is restricted to users who have verified their email address.

Because the current `$panel` is available, you can apply different rules for each panel.
For instance, you may require stricter checks for an **admin chat panel**, while keeping other panels open to all users:

```php{}{14-22}

namespace App\Models;

use Namu\WireChat\Panel;
use Namu\WireChat\Traits\InteractsWithWireChat;
use Namu\WireChat\Contracts\WireChatUser;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements WireChatUser
{
    use InteractsWithWireChat;
    // ...

    public function canAccessWireChatPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return $this->is_admin && $this->hasVerifiedEmail();
        }

        return true;
    }
}
```
---

<x-section-heading label="Action Permissions" />

You may configure which features a user has access to by defining permission methods on the `User` model.

<x-sub-section-heading label="Allow Users to Create Chats" />

Determine if the "create chat" action should be visible to the current user:

```php
namespace App\Models;

use Namu\WireChat\Traits\InteractsWithWireChat;
use Namu\WireChat\Contracts\WireChatUser;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements WireChatUser
{
    use InteractsWithWireChat;

    public function canCreateChats(): bool
    {
        return $this->hasVerifiedEmail();
    }
}
````

You can also add conditions based on your own application logic,
such as checking subscriptions, roles, or other permissions.

---

<x-sub-section-heading label="Allow Users to Create Groups" />

Determine if the "create group" action should be visible to the current user:

```php
namespace App\Models;

use Namu\WireChat\Traits\InteractsWithWireChat;
use Namu\WireChat\Contracts\WireChatUser;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements WireChatUser
{
    use InteractsWithWireChat;

    public function canCreateGroups(): bool
    {
        return $this->hasVerifiedEmail();
    }
}
```

---
<x-section-heading label="Attributes" />

User attributes define how names, avatars, and profile links appear throughout chats.

<x-sub-section-heading label="User’s Name" />

By default, WireChat uses the `name` attribute from your `User` model.
You may override this by defining the `getWirechatNameAttribute()` method:

```php
use Namu\WireChat\Traits\InteractsWithWireChat;
use Namu\WireChat\Contracts\WireChatUser;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements WireChatUser
{
    use InteractsWithWireChat;

    public function getWirechatNameAttribute(): string
    {
        return $this->display_name ?? $this->name;
    }
}
```

---

<x-sub-section-heading label="Avatar URL" />

Set the URL that should be used for the user’s avatar across chats, member lists, and chat info:

```php
namespace App\Models;

use Namu\WireChat\Traits\InteractsWithWireChat;
use Namu\WireChat\Contracts\WireChatUser;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements WireChatUser
{
    use InteractsWithWireChat;

    public function getWirechatAvatarUrlAttribute(): string
    {
        return $this->avatar_url ?? asset('images/default-avatar.png');
    }
}
```

---

<x-sub-section-heading label="Profile URL" />

When a user’s name or avatar is clicked, WireChat will use the `getWirechatProfileUrlAttribute()` method
to determine where to redirect:

```php
use Namu\WireChat\Traits\InteractsWithWireChat;
use Namu\WireChat\Contracts\WireChatUser;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements WireChatUser
{
    use InteractsWithWireChat;

    public function getWirechatProfileUrlAttribute(): string
    {
        return route('profile.show', $this->id);
    }
}
```

---

<x-section-heading label="Searching Users" />

WireChat provides a flexible way to control how users are searched when starting new conversations
or adding members to a group.

By default, a simple search is performed on your `User` model, but you can fully customize this behavior.


<x-section-heading label="Customizing Searchable Attributes" key="Searchable Attributes" />

If no custom callback is defined, WireChat will search your `User` model using the attributes you specify:

```php
use Namu\WireChat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->searchableAttributes(['name', 'email', 'username']);
}
```

In this example, a query like `"john"` will match users where the `name`, `email`, or `username` contains `"john"`.

---

<x-section-heading label="Customizing the Search" />

To fully control the search logic, define a callback using `searchUsersUsing()`.
Always wrap your results in `WireChatUserResource` to maintain a consistent structure:

```php
use Namu\WireChat\Panel;
use Namu\WireChat\Http\Resources\WireChatUserResource;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->searchUsersUsing(function (string $needle) {
            return WireChatUserResource::collection(
                \App\Models\User::query()
                    ->where('is_active', true)
                    ->where('name', 'like', "%{$needle}%")
                    ->limit(20)
                    ->get()
            );
        });
}
```

> **Important:** Always return results using `WireChatUserResource`.
> This ensures a consistent structure with `id`, `type`, `display_name`, and `cover_url` across both Livewire and API responses.

**In this example:**

* Only active users are returned.
* The search is limited to the `name` field.
* Using `WireChatUserResource` guarantees standardized responses.

---

Once configured, all user searches whether starting chats, creating groups, or adding members will follow your defined logic and return standardized results.

</x-markdown>

<x-slot name="subNavigation">
    <x-sub-navigation :items="[
    'Introduction',
    'Panel access',
    'Action Permissions' => [
        'Allow Users to Create Chats',
        'Allow Users to Create Groups',
    ],
    'Attributes' => [
        'User’s Name',
        'Avatar URL',
        'Profile URL',
    ],
    'Searching Users' => [
        'Searchable Attributes',
        'Customizing the Search',
    ],
]"/>
</x-slot>

</x-docs-layout>

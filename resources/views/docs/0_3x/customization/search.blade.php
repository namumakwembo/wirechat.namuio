<x-docs-layout>

<x-markdown>

# Searching Users

WireChat provides a flexible way to control **how users are searched** when creating new conversations or adding members to a group.
By default, WireChat performs a simple search on your `User` model, but you can fully override this behavior by defining custom search logic in your panel.

<x-section-heading label="Customizing Searchable Attributes" key="Searchable Attributes" />

If no custom callback is defined, WireChat searches the `User` model using the attributes you specify as searchable.
You can configure these fields like so:

```php
use Namu\WireChat\Panel;

public function panel(Panel $panel): Panel
{
return $panel
    //...
    ->searchableAttributes(['name', 'email', 'username']);
}
````

In this example, a query like `"john"` will match users where the `name`, `email`, or `username` contains `"john"`.

---

<x-section-heading label="Customizing the Search" />

Search logic is scoped to a panel. To completely override the default behavior,
you can define a custom callback with the `searchUsersUsing()` method.
**Make sure to wrap the results in `WireChatUserResource`** to standardize the output:

```php
use Namu\WireChat\Panel;
use Namu\WireChat\Http\Resources\WireChatUserResource;

public function panel(Panel $panel): Panel
{
return $panel
    //...
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
> **Important:** Always return results using `WireChatUserResource`. This ensures a **consistent response structure** with `id`, `type`, `display_name`, and `cover_url` across Livewire, and API responses.


In this example:

* Only active users are returned.
* The search runs against the `name` field only.
* Using `WireChatUserResource` ensures a consistent structure (`id`, `type`, `display_name`, `cover_url`).

---

Once configured, all user searches whether starting chats, creating groups, or adding members  will follow your defined logic and return **standardized responses**.

</x-markdown>

<x-slot name="subNavigation">
<x-sub-navigation :items="['Searchable Attributes', 'Customizing the Search']"/>
</x-slot>

</x-docs-layout>

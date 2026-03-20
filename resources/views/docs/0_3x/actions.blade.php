<x-docs-layout>

<x-markdown>

# Actions

Actions are the buttons and menu items users interact with throughout Wirechat, such as starting a chat, creating a group, clearing a conversation, deleting a chat, or returning to another page in your application.

You configure these actions from your panel provider so the same behavior is applied anywhere that panel is rendered.

<x-section-heading label="Overview" />

Wirechat provides these action-related panel methods:

- `createChatAction()`
- `clearChatAction()`
- `deleteChatAction()`
- `createGroupAction()`
- `redirectToHomeAction()`
- `deleteMessageActions()`

Each action accepts a `bool` or `Closure` condition as its first argument, which means you can keep an action always enabled, disable it completely, or decide at runtime when it should appear.

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        ->createChatAction()
        ->createGroupAction()
        ->clearChatAction()
        ->deleteChatAction()
        ->redirectToHomeAction(url: '/dashboard')
        ->deleteMessageActions();
}
```

<x-section-heading label="Action Conditions" />

Every action method accepts a condition as its first argument.

- Use `true` to always show the action.
- Use `false` to hide it.
- Use a `Closure` when the result should be decided at runtime.

This is especially useful when your application already has its own feature flags, settings, or user-based rules.

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        ->createChatAction(
            condition: fn () => auth()->user()?->hasVerifiedEmail() ?? false,
        )
        ->deleteMessageActions(
            condition: fn () => auth()->user()?->hasVerifiedEmail() ?? false,
        );
}
```

<x-section-heading label="Create Chat Action" />

Use `createChatAction()` to show the new-chat button in the chats header.
When clicked, it opens the modal used to start a new private conversation.

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel->createChatAction(
        condition: true,
        icon: 'wirechat::icons.messages-plus',
        iconAttributes: [
            'class' => 'size-5 text-sky-600 hover:text-sky-700',
            'title' => 'Start a chat',
            'aria-hidden' => 'true',
        ],
    );
}
```

If you also want users to create groups from that same modal, enable `createGroupAction()` as well.

<x-section-heading label="Create Group Action" />

Use `createGroupAction()` to enable the **New Group** option inside the new-chat modal.

In the default interface, that modal is opened by `createChatAction()`, so these two actions are commonly enabled together.

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        ->createChatAction()
        ->createGroupAction();
}
```

At the moment, `createGroupAction()` only accepts the `condition` argument.

<x-section-heading label="Clear Chat Action" />

Use `clearChatAction()` to show the clear-history action for private chats.

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel->clearChatAction();
}
```

The panel API also accepts `icon` and `iconAttributes` for `clearChatAction()`, but the current interface renders this action as a text-only dropdown item, so those icon settings are not visible in the UI yet.

<x-section-heading label="Delete Chat Action" />

Use `deleteChatAction()` to enable chat deletion for private chats.

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel->deleteChatAction(
        condition: true,
        icon: 'wirechat::icons.trash',
        iconAttributes: [
            'class' => 'size-5 text-red-600 hover:text-red-700',
            'title' => 'Delete chat',
        ],
    );
}
```

In the current interface, the custom icon is rendered in the chat info view. The delete entry in the chat dropdown menu remains text-only.

<x-section-heading label="Redirect To Home Action" />

Use `redirectToHomeAction()` to add a shortcut in the chats header that links users back to another page in your application.

This method already accepts the destination URL directly, so in most cases this is all you need:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel->redirectToHomeAction(url: '/dashboard');
}
```

If you also want to customize the icon, you can pass the full argument set:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel->redirectToHomeAction(
        condition: true,
        url: '/dashboard',
        icon: 'wirechat::icons.logout',
        attributes: [
            'class' => 'size-5 text-zinc-500 hover:text-zinc-700',
            'title' => 'Back to dashboard',
            'aria-hidden' => 'true',
        ],
    );
}
```

Unlike the other icon-capable action methods, `redirectToHomeAction()` names its fourth argument `attributes`.
Those attributes are still applied to the icon element.

If you prefer, `homeUrl()` is also available, but for most setups passing `url:` directly to `redirectToHomeAction()` is simpler.

<x-section-heading label="Delete Message Actions" />

Use `deleteMessageActions()` to control the delete options shown in the message dropdown.

- In private chats, it controls both **Delete for me** and **Delete for everyone**.
- In groups, admins or message owners can still see **Delete for everyone** when the action is enabled.

Delete message actions are enabled by default:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel->deleteMessageActions(false);
}
```

At the moment, this action only exposes the `condition` argument.

<x-section-heading label="Action Icons" />

Some actions allow you to customize their icons directly from the panel.

At the moment, configurable icons are rendered for:

- `createChatAction()`
- `deleteChatAction()`
- `redirectToHomeAction()`

The package currently ships these built-in action icon components:

- `wirechat::icons.messages-plus`
- `wirechat::icons.trash`
- `wirechat::icons.logout`

For anything else, you may use your own Blade component name or pass trusted raw SVG/HTML via `Htmlable`.

<x-section-heading label="Icon Attributes" />

When you pass a Blade component name string as the icon, Wirechat merges your attributes into the component and appends its default icon classes.

This is the easiest way to adjust sizing, color, titles, or ARIA attributes without touching the package views.

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel->createChatAction(
        icon: 'wirechat::icons.messages-plus',
        iconAttributes: [
            'class' => 'size-5 text-emerald-600 hover:text-emerald-700',
            'title' => 'Start conversation',
            'aria-hidden' => 'true',
        ],
    );
}
```

<x-section-heading label="Using Raw SVG" />

If you need full control over the markup, pass trusted SVG using `HtmlString`:

```php
use Illuminate\Support\HtmlString;
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel->createChatAction(
        icon: new HtmlString('
            <svg class="size-5 text-zinc-700" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path d="M12 4a1 1 0 0 1 1 1v6h6a1 1 0 1 1 0 2h-6v6a1 1 0 1 1-2 0v-6H5a1 1 0 1 1 0-2h6V5a1 1 0 0 1 1-1Z"/>
            </svg>
        '),
    );
}
```

When using raw `HtmlString` icons, include classes and accessibility attributes directly inside the SVG itself.
`iconAttributes` are only merged when the icon is rendered as a Blade component.

<x-section-heading label="Notes" />

- Use the [Panels]({{ docs()->route('panels') }}) page for the rest of the panel API.
- Use the [Chats]({{ docs()->route('rooms.chats') }}) and [Groups]({{ docs()->route('rooms.groups') }}) pages for action behavior inside those screens.
- `homeUrl()` is still available if you prefer setting the destination separately, but `redirectToHomeAction(url: ...)` is usually enough.
- Only pass trusted markup when using raw SVG or HTML.

</x-markdown>

<x-slot name="subNavigation">
    <x-sub-navigation :items="[
        'Overview',
        'Action Conditions',
        'Create Chat Action',
        'Create Group Action',
        'Clear Chat Action',
        'Delete Chat Action',
        'Redirect To Home Action',
        'Delete Message Actions',
        'Action Icons',
        'Icon Attributes',
        'Using Raw SVG',
        'Notes',
    ]"/>
</x-slot>

</x-docs-layout>

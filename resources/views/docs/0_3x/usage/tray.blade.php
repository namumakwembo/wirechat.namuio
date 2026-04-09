<x-docs-layout>

<x-markdown>

# Tray Widget

The Tray is a compact floating entry point for Wirechat that keeps conversations close at hand across your application.

It is designed for layouts where users should be able to open chat quickly without leaving the page they are already working on.

<x-pro-feature-banner />

<x-section-heading label="Placing It In A Layout" />

The Tray is intended for shared authenticated layouts so it stays available across the parts of your application where chat matters.


```blade{2,10,13}
<html>
    <head>
        @@wirechatStyles
    </head>
    <body>
        ...

        @@wirechatAssets()
        @@auth
        @verbatim
            <livewire:wirechat.tray panel="chats" />
        @endverbatim
        @@endauth
    </body>
</html>
```


This is a good place to render it when chat should stay available throughout the authenticated part of your application.

By default, the widget renders as a fixed floating tray in the bottom-right corner.

<x-sub-section-heading label="Keeping It Mounted" />

If you want the Tray to stay mounted across persisted page transitions, you may wrap it in @verbatim  `@persist('wirechat-tray')`@endverbatim:

@verbatim
```html
@persist('wirechat-tray')
    @auth
        <livewire:wirechat.tray panel="chats" />
    @endauth
@endpersist
```
@endverbatim

This is optional, but it can be a good fit when you want the Tray to feel more continuous across the app.

<x-section-heading label="How It Works" />

When the Tray is closed, it shows a compact summary bar with:

- a `Messages` label
- an unread badge when unread conversations exist
- recent conversation avatars

When the Tray is opened, Wirechat loads the full floating chat interface inside the tray.

<x-section-heading label="Using A Panel" />

If your application has a default panel, the Tray can be rendered without passing anything else.

If you need to target a specific panel, you may pass either a panel ID or a panel instance.

<x-sub-section-heading label="Panel ID" />

@verbatim
```blade
<livewire:wirechat.tray panel="chats" />
```
@endverbatim


This is useful when the current layout already knows which Wirechat panel it should use.

<x-section-heading label="Recent Conversation Limit" />

Use `limit` to control how many recent conversations the widget loads for its summary:

@verbatim
```blade
<livewire:wirechat.tray panel="chats" :limit="8" />
```
@endverbatim

Wirechat uses that collection to calculate the unread summary and recent conversation preview shown by the tray.

<x-section-heading label="Customizing The Tray" />

Use `class` to add custom classes to the opened tray panel:

@verbatim
```blade
<livewire:wirechat.tray class="bottom-3 right-3 w-[28rem]" />
```
@endverbatim

Use `launcherClass` to customize the closed tray launcher:

@verbatim
```blade
<livewire:wirechat.tray launcherClass="rounded-full px-4 py-2 shadow-lg" />
```
@endverbatim

Use `heading` to change the label shown in the launcher and the tray chats header:

@verbatim
```blade
<livewire:wirechat.tray heading="Inbox" />
```
@endverbatim

You may combine them when you need to adjust both the tray panel and the launcher:

@verbatim
```blade
<livewire:wirechat.tray
    class="bottom-3 right-3 w-[28rem]"
    launcherClass="rounded-full px-4 py-2 shadow-lg"
    heading="Inbox"
/>
```
@endverbatim



<x-section-heading label="Panel Relationship" />

The Tray uses a Wirechat panel to resolve the chat experience it should open.

That means it follows the same panel configuration for routes, middleware, actions, tabs, attachments, and other panel-level features. If you need help configuring the panel itself, see the [Panels]({{ docs()->route('panels') }}) page.

<x-section-heading label="Notes" />

- The Tray is intended for authenticated users. The widget requires an authenticated user before it can load.
- Render the Tray once in a shared layout rather than mounting multiple instances on the same page.
- The floating chat interface is loaded when the tray opens, which keeps the closed state lightweight.
- In tray mode, Wirechat includes tray-specific controls such as closing the tray and opening the full chats page.
- If you want a full embedded chat surface instead of a floating entry point, see the [Embedding]({{ docs()->route('customization.embedding') }}) guide.

</x-markdown>

<x-slot name="subNavigation">
    <x-sub-navigation :items="[
        'Placing It In A Layout' => [
            'Keeping It Mounted',
        ],
        'How It Works',
        'Using A Panel' => [
            'Panel ID',
        ],
        'Recent Conversation Limit',
        'Customizing The Tray',
        'Panel Relationship',
        'Notes',
    ]" :pro="true" />
</x-slot>

</x-docs-layout>

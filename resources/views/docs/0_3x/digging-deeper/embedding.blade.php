<x-docs-layout>
<x-markdown>

# Embedding Components

Building a real-time chat system in a Laravel application often means juggling complex JavaScript frameworks, event broadcasting, and layout constraints. **Wirechat** solves these headaches by providing a collection of Livewire-powered chat components that seamlessly integrate into your existing Blade templates, delivering a single-page, real-time conversation experience without full-page refreshes.

In this guide, we’ll walk through preparing your layouts and embedding Wirechat’s components like `wirechat`, `chats`, or `chat` directly into any Blade view. By staying within the familiar boundaries of Laravel and Livewire, you’ll save development time, reduce complexity, and ensure your in-app chat remains consistent with the rest of your application’s UI.

---

## Preparing Your Custom Layout

Before embedding any Wirechat components, confirm that your layout includes the required styles and assets. This step is key to ensuring proper functionality and a consistent look and feel across your app:

```{3,8}
<html>
    <head>
        @@wirechatStyles
    </head>
    <body>
        ...

        @@wirechatAssets
    </body>
</html>
```

> **Note:** We assume Livewire’s required assets are already included or automatically injected.

---

<x-section-heading label="Standalone Wirechat Widget"/>

With your layout set, you can embed the all-in-one `wirechat` component, which serves as a widget by default. This widget merges both `chats` and `chat` components into a cohesive conversation experience. Unlike accessing Wirechat from its default route, embedding it in your own layout provides a standalone SPA-like flow—meaning transitions between chats are handled dynamically without forcing a full-page reload.

@verbatim
```
<div class="h-[calc(100vh_-_10.0rem)]">
    <livewire:wirechat/>
</div>
```
@endverbatim

> **Important:**
> Always wrap Wirechat in a container with a **fixed height**. Otherwise, new messages and chats may overflow or render incorrectly.

<x-sub-section-heading label="Styling Embedded Widgets"/>

Embedded Wirechat components also accept scoped UI props so you can override wrapper classes without affecting every nested layer.

- `class` and `styles` apply to the outer `wirechat` widget shell.
- `chatsClass` and `chatsStyles` apply only to the embedded chats list inside the `wirechat` widget.
- `chatClass` and `chatStyles` apply only to the active chat panel inside the `wirechat` widget.
- When you embed `wirechat.chats` or `wirechat.chat` directly, those standalone components also accept `class` and `styles`.

Because custom classes are appended after Wirechat’s defaults, utilities like Tailwind border and radius overrides work as expected.

@verbatim
```blade
<div class="h-[calc(100vh_-_10.0rem)]">
    <livewire:wirechat class="border-none rounded-none" />
</div>
```
@endverbatim

That example removes the default border and rounding from the outer Wirechat widget while leaving the inner chats and chat shells unchanged.

If you want to target each layer separately, you can pass dedicated props:

@verbatim
```blade
<div class="h-[calc(100vh_-_10.0rem)]">
    <livewire:wirechat
        class="border-none rounded-none"
        chatsClass="border-r-none"
        chatClass="dark:bg-gray-700 border"
    />
</div>
```
@endverbatim

---

<x-section-heading label="Components"/>

Wirechat offers a range of flexible, standalone Livewire components that you can embed anywhere in your application. Whether you need a full chat panel, a compact chat widget, or advanced group features, these components adapt seamlessly to your existing layout and styles.

If you'd like to extend or override any of these components, refer to the
[**Available Wirechat Components**]({{ route('customization.core-components') }}). Below is a quick example of how you can embed the `chats` widget on a custom page:

---

<x-section-heading label="Example: Chats Component"/>

Sometimes, you only want a list of available conversations in a specific area—like a dropdown or sidebar—without loading the entire chat interface. That’s where the `chats` component shines. It operates independently and can open full chats elsewhere, based on how you configure it.

### **Traditional Component**

@verbatim
```blade
{{-- Ensure a fixed-height parent --}}
<div class="h-[calc(100vh_-_10.0rem)]">
    <livewire:wirechat.chats/>
</div>
```
@endverbatim

In “traditional” mode, clicking on a conversation sends the user to the default conversation route, loading the chat on a new page.

You can also style the standalone chats component directly:

@verbatim
```blade
<div class="h-[calc(100vh_-_10.0rem)]">
    <livewire:wirechat.chats class="rounded-none" />
</div>
```
@endverbatim

### **Widget Component**

For a completely dynamic experience, pass `widget="true"` to the `chats` component:

@verbatim
```
<div class="h-[calc(100vh_-_10.0rem)]">
    <livewire:wirechat.chats widget="true" />
</div>
```
@endverbatim

When a conversation is clicked, an `open-chat` event is dispatched as a Livewire event. If the `wirechat` component is on the same page, it listens for that event and immediately loads the selected chat—no page refresh required.

The standalone chat component supports the same scoped wrapper overrides:

@verbatim
```blade
<livewire:wirechat.chat
    :conversation="$conversation->id"
    class="rounded-none"
/>
```
@endverbatim

---

<x-section-heading label="Tray Widget" />

If you want chat to stay available as a floating entry point across your layout instead of occupying page content, see the Pro [Tray Widget]({{ docs()->route('usage.tray') }}) guide.

---

<x-sub-section-heading label="Widget Events"/>

When a component is used as a widget by passing `widget="true"`, it will no longer redirect or reload the page after certain actions. Instead, it will trigger several browser and Livewire events during conversation transitions. These events let you hook into and extend chat functionality at various points in the user flow. Here are the most common ones:

| **Event**     | **Parameter**        | **Description**                                            |
|--------------|---------------------|--------------------------------------------------------------|
| `open-chat`  | `conversation` (ID) | Fires when a chat is clicked in the `chats` component.       |
| `close-chat` | `conversation` (ID) | Fires when a chat is closed (e.g., deleted, exited).         |
| `chat-opened`| `conversation` (ID) | Fires once a chat is fully loaded as a widget.               |

By leveraging these events, you can customize the chat experience at every step—without ever disrupting Wirechat’s seamless SPA like environment.

---
</x-markdown>
</x-docs-layout>

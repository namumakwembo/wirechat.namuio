<x-docs-layout>
<x-markdown>

# Embedding Components

Building a real-time chat system in a Laravel application often means juggling complex JavaScript frameworks, event broadcasting, and layout constraints. **WireChat** solves these headaches by providing a collection of Livewire-powered chat components that seamlessly integrate into your existing Blade templates, delivering a single-page, real-time conversation experience without full-page refreshes.

In this guide, we’ll walk through preparing your layouts and embedding WireChat’s components  like `wirechat`, `chats`, or `chat`  directly into any Blade view. By staying within the familiar boundaries of Laravel and Livewire, you’ll save development time, reduce complexity, and ensure your in-app chat remains consistent with the rest of your application’s UI.

---

## Preparing Your Custom Layout

Before embedding any WireChat components, confirm your layout includes the required styles and assets. This step is key to ensuring proper functionality and a consistent look and feel across your app:

```blade{3,8}
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

<x-section-heading label="Embedding the Wirechat Widget"/>

With your layout set, you can embed the all-in-one `wirechat` widget. This widget merges both `chats` and `chat` components into a cohesive conversation experience. Unlike accessing WireChat from its default route, embedding it in your own layout provides a standalone SPA-like flow  meaning transitions between chats are handled dynamically without forcing a full-page reload.

@verbatim
```blade
<div class="h-[calc(100vh_-_10.0rem)]">
    <livewire:wirechat/>
</div>
```
@endverbatim

> **Important:**  
> Always wrap WireChat in a container with a **fixed height**. Otherwise, new messages and chats can overflow or render incorrectly.

---

<x-sub-section-heading   label="Widget Component Events"/>

When the `wirechat` component is used as a widget  either by default or by passing `widget="true"` to a WireChat component  it triggers several browser and Livewire events during conversation transitions. These events let you hook into and extend chat functionality at various points in the user flow. Here are the most common ones:

| **Event**     | **Parameter**           | **Description**                                                     |
|---------------|-------------------------|---------------------------------------------------------------------|
| `open-chat`   | `conversation` (ID)    | Fires when a chat is clicked in the `chats` component.             |
| `close-chat`  | `conversation` (ID)    | Fires when a chat is closed (e.g., deleted, exited, or closed).     |
| `chat-opened` | `conversation` (ID)    | Fires once a chat is fully loaded as a widget.                      |

By leveraging these events, you can customize the chat experience at every step  without ever disrupting WireChat’s seamless SPA-like environment.

---

<x-section-heading label="Embedding Other Components"/>

WireChat offers a range of flexible, standalone Livewire components that you can embed anywhere in your application. Whether you need a full chat panel, a compact chat widget, or advanced group features, these components adapt seamlessly to your existing layout and styles.

If you'd like to extend or override any of these components, refer to the 
[**Available WireChat Components**]({{ route('customization.core-components') }}). Below is a quick example of how you can embed the `chats` widget on a custom page:


<x-section-heading label="Example: embedding chats component"/>

Sometimes, you only want a list of available conversations in a specific area  like a dropdown or sidebar  without loading the entire chat interface. That’s where the `chats` component shines. It operates independently and can open full chats elsewhere, based on how you configure it.


**Traditional component:**

@verbatim
```blade
<div class="h-[calc(100vh_-_10.0rem)]"> {{-- Ensure a fixed height parent --}}
    <livewire:chats/>
</div>
```
@endverbatim

In “traditional” mode, clicking on a conversation sends the user to the default conversation route, loading the chat on a new page.


**Widget component:**

For a completely dynamic experience, pass `widget="true"` to the `chats` component:

@verbatim
```blade
<div class="h-[calc(100vh_-_10.0rem)]"> {{-- Ensure a fixed height parent --}}
    <livewire:chats widget="true" />
</div>
```
@endverbatim

When a conversation is clicked, `open-chat` is dispatched as a Livewire event. If the `wirechat` component is on the same page, it listens to that event and immediately loads the selected chat  no page refresh required.

---
</x-markdown>
</x-docs-layout>
        
<x-docs-layout>

<x-markdown>
# Overview

Once you’ve installed and configured WireChat, you’re ready to create engaging chat experiences. Whether you’re starting conversations through the UI, initiating chats programmatically, or managing private conversations, WireChat provides a flexible solution for every use case.

Before you begin, make sure your models are prepared for chat functionality. If you haven’t already, visit the [**Setup**]({{ route('setup') }}) page to integrate the required trait.

---

<x-section-heading label="Panels" />

Panels let you configure distinct chat environments such as user chats, admin chats, or support chats in a clean and centralized way. Whether you’re managing one panel or several, this system makes your setup flexible and easier to maintain.

By default, the main panel is available at `'/chats'`. If no panel has been defined, you can learn more in the [Panels Configuration]({{ docs()->route('panels') }}) section.

---

<x-section-heading label="Rooms" />

In addition to private 1-on-1 chats, WireChat also supports **Groups**, enabling multi-user conversations. Both chats and groups can be created easily through the UI or programmatically.

Learn more about [Chats]({{ docs()->route('rooms.chats') }}) and [Groups]({{ docs()->route('rooms.groups') }}).

---

<x-section-heading label="Messaging" />

Messages in WireChat can be sent in multiple ways—either via methods provided by the `'InteractsWithWirechat'` trait e.g., `'sendMessageTo($user)'` or through the built-in UI, which provides a ready-to-use chat interface.

All messages are broadcasted in real time via WebSockets, ensuring a fast and seamless communication experience.

---

<x-section-heading label="Features" />

WireChat comes with a variety of features out of the box. These can be configured on a per-panel basis, giving you full control over the chat experience.

Configurable features include:

- File attachments
- Emoji picker
- Chat search
- And more

Learn more about [Chats]({{ docs()->route('rooms.chats') }}).


</x-markdown>

    <x-slot name="subNavigation">
        <x-sub-navigation :items="[
            'Panels',
            'Rooms',
            'Messaging',
            'Features'
        ]" />
    </x-slot>
{{--

<x-section-heading label="Sending a Message" />
There are multiple ways to send a message ,here are the few ways to easili...

- **Via the WireChat UI**

    1. Open a chat from your list.
    2. Type your message in the message box.
    3. Click **Send** or press Enter.


- **Sending Programmatically**

To a user:

```php
$otherUser = User::first();
$auth = auth()->user();
$message = $auth->sendMessageTo($otherUser, 'Your message here'); //returns Message Model
```
To a conversation directly:

```php
$auth = auth()->user();
$conversation = $auth->conversations()->first();
$message = $auth->sendMessageTo($conversation, 'Your message here'); //returns Message Model
```

**Note:** WireChat will validate the user’s authorization to send messages to the conversation and create it if it doesn’t
exist.

--}}

</x-docs-layout>

<x-docs-layout>

<x-markdown>
# Overview

Once you’ve installed and configured WireChat, you’re ready to create engaging chat experiences. Whether you’re starting conversations using the intuitive UI, initiating chats programmatically, or managing private conversations, WireChat offers a flexible solution for every need.

Before you begin, ensure your models are prepared for chat functionality. If you haven’t already, visit the [**Setup**]({{ route('setup') }})  page to integrate the necessary trait.
<x-section-heading label="Chat Interface" />

To start exploring WireChat, navigate to the path defined in your panel. If you dont have a panel you can learn more about panels in
the  [Panels Configuration]({{ docs()->route('panels') }}) .

<x-section-heading label="Enable Chat Action" />

To enable the "New Chat" modal button in the WireChat UI, ensure the `->newChatAction()` method  is enabled in your WireChat panel.

```php
use Namu\WireChat\Panel;

public function panel(Panel $panel): Panel
{
    $panel
        //...
        ->newChatAction();
}
```
<x-section-heading label="Starting a Chat" />

-  **Using the WireChat UI**

    1. Click the **Plus** icon in the chat list.
    2. Search for and select a user to start a conversation with. [Customize Search]({{ docs()->route('customization.users') }}).
    3. Click on the user’s name to initiate a chat.

- **Creating a Private Chat Programmatically**

    With another user:

    ```bash
    $otherUser = User::first();
    $auth = auth()->user();
    $conversation = $auth->createConversationWith($otherUser, 'Optional message');
    ```

    With yourself:

    ```bash
    $auth = auth()->user();
    $conversation = $auth->createConversationWith($auth, 'Optional message');
    ```

**Note:** If a conversation already exists between the two participants, it will be returned instead of creating a new
one.
___

<x-section-heading label="Sending a Message" />

- **Via the WireChat UI**

    1. Open a chat from your list.
    2. Type your message in the message box.
    3. Click **Send** or press Enter.


- **Sending Programmatically**

    To a user:

    ```bash
    $otherUser = User::first();
    $auth = auth()->user();
    $message = $auth->sendMessageTo($otherUser, 'Your message here'); //returns Message Model
    ```
    To a conversation directly:

    ```bash
    $auth = auth()->user();
    $conversation = $auth->conversations()->first();
    $message = $auth->sendMessageTo($conversation, 'Your message here'); //returns Message Model
    ```

**Note:** WireChat will validate the user’s authorization to send messages to the conversation and create it if it doesn’t
exist.

---

<x-section-heading label="Managing Conversations" />


- **Viewing Conversations**

    Visit the `/chats` route to see your active conversations. Conversations you’ve deleted, groups you’ve exited,
    or blank conversations (no messages) will not appear in the list.


- **Programmatically Fetching Conversations**

    ```bash
    $auth = auth()->user();
    $conversations = $auth->conversations()->get();
    ```

----

<x-sub-section-heading  label="Applying Scopes:" />

- **Exclude Blank Conversations:**
  ```bash
  $conversations = $auth->conversations()->withoutBlanks()->get();
  ```

- **Exclude Deleted Conversations:**
  ```bash
  $conversations = $auth->conversations()->withoutDeleted()->get();
  ```

**Note:** For these scopes to take effect , the user must be authenticated

---

<x-section-heading label="Clearing Conversations" />

Clearing a conversation removes all messages for you but keeps the conversation in the list.

- **UI Instructions**
    1. Open a chat.
    2. Select **Clear Chat History** from the menu or **Chat Info**.

- **Programmatically Clear a Conversation:**
    ```bash
    $auth = auth()->user();
    $conversation = $auth->conversations()->first();
    $conversation->clearFor($auth);
    ```

---

<x-section-heading label="Deleting Conversations" />

Deleting a conversation removes it from your list and clears its messages. For private chats, it will remain
deleted and excluded from list unless another message is sent or received.

- **UI Instructions:**
    1. Open a chat.
    2. Select **Delete Chat** from the menu or **Chat Info**.

- **Programmatically Delete a Conversation:**
    ```bash
    $auth = auth()->user();
    $conversation = $auth->conversations()->first();
    $conversation->deleteFor($auth);
    ```

**Note:** Conversations are permanently deleted if all participants delete them or if it's a self-chat.

---

<x-section-heading label="Chat Utility Methods" />

WireChat includes several built-in helper methods to streamline your conversation management. Use these utilities to verify user membership in conversations, check for existing conversations with other users, and even confirm message ownership. These methods help keep your application logic clean and efficient.

**Check User Membership in a Conversation:**

```php
$user->belongsToConversation($conversation); // Returns bool
```

**Check Existing Conversations with Another User:**

```php
$user->hasConversationWith($anotherUser); // Returns bool
```

**Verify Message Ownership:**

```php
$message->ownedBy($user); // Returns bool
```

---

</x-markdown>

    <x-slot name="subNavigation">
        <x-sub-navigation :items="[
            'Chat Interface',
            'Enable Chat Action',
            'Starting a Chat',
            'Sending a Message',
            'Managing Conversations ',
            'Applying Scopes:',
            'Clearing Conversations',
            'Deleting Conversations',
            'Chat Utility Methods',
        ]" />
    </x-slot>

</x-docs-layout>

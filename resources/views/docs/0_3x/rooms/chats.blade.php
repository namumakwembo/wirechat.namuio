<x-docs-layout>

<x-markdown>

# Chats

Wirechat allows you to create private 1-on-1 chats, manage settings from the panel, send messages, and perform actions such as deleting or clearing chats.

---

<x-section-heading label="Creating Chats" />

To allow users to create new chats, enable the action in your Wirechat **panel**:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        //...
        ->createChatAction();
}
````

> **Note:** If disabled, users won’t see the option to create new chats in the UI.


-  **Create Using the WireChat UI**

    1. Click the **Plus** icon in the chat list.
    2. Search for and select a user to start a conversation with. [Customize Search]({{ docs()->route('customization.users',['#searching-users']) }}).
    3. Click on the user’s name to initiate a chat.

- **Creating a Private Chat Programmatically**

With another user:

```php
$otherUser = User::first();
$auth = auth()->user();
$conversation = $auth->createConversationWith($otherUser, 'Optional message');
```

With yourself:

```php
$auth = auth()->user();
$conversation = $auth->createConversationWith($auth, 'Optional message');
```

**Note:** If a conversation already exists between the two participants, it will be returned instead of creating a new
one.
___

<x-section-heading label="Deleting Chats" />

Deleting a chat removes it from your list and clears its messages. In private chats, it stays deleted unless a new message is sent or received.

<x-sub-section-heading label="Enable Delete Action" />

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        //...
        ->deleteChatAction();
}
```

<x-sub-section-heading label="How to Delete" />

* **UI Instructions**

  1. Open a chat.
  2. Choose **Delete Chat** from the menu or **Chat Info**.

* **Programmatically**

  ```php
  $auth = auth()->user();
  $conversation = $auth->conversations()->first();
  $conversation->deleteFor($auth);
  ```

**Note:** When you delete a chat, other participants still keep their copy. A conversation is permanently removed only if all participants delete it or if it’s a self-chat.

---

<x-section-heading label="Clearing Chats" />

Clearing removes all messages for you but keeps the conversation visible for other participants.

<x-sub-section-heading label="Enable Clear Action" />

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        //...
        ->clearChatAction();
}
```

<x-sub-section-heading label="How to Clear" />

* **UI Instructions**

  1. Open a chat.
  2. Select **Clear Chat History** from the menu or **Chat Info**.

* **Programmatically**

  ```php
  $auth = auth()->user();
  $conversation = $auth->conversations()->first();
  $conversation->clearFor($auth);
  ```

---

</x-markdown>
<x-slot name="subNavigation">
    <x-sub-navigation :items="[
    'Creating Chats',
    'Deleting Chats'=>[
        'Enable Delete Action',
        'How to Delete'
          ],
        'Clearing Chats'=>[
            'Enable Clear Action',
            'How to Clear'
      ],
   ]
"/>

    </x-slot>

</x-docs-layout>

<x-docs-layout>

<x-markdown>

# Overview

Once you’ve installed and configured WireChat, you're just a few steps away from creating engaging chat
experiences.

To get started, visit the default chat interface at:
**`/chats`**

---

<x-section-heading label="Getting Started" />

To begin using WireChat, ensure you integrate the **Chatable** trait into the models you want to enable for
chatting. WireChat is polymorphic, so it can be added to any model, not just the User model.

### Adding the Chatable Trait

Add the `Chatable` trait to your **User** model:

```bash{}{6}
use Illuminate\Foundation\Auth\User as Authenticatable;
use Namu\WireChat\Traits\Chatable;

class User extends Authenticatable
{
use Chatable;

...
}
```

After this setup, your model will be ready to start conversations, send messages, and more.

---

<x-section-heading label="Starting a Chat" />


<x-sub-section-heading  label="Using the WireChat UI" key="Starting Chat Using the WireChat UI" />


1. Navigate to the `/chats` route, defined in your [WireChat
configuration]({{ route('customization.config') }}).
2. Click the **Plus** icon in the chat list.
3. Search for and select a user to start a conversation with. _(Customize Search; see [Trait
Customization]({{ route('customization.trait') }}))_.
4. Click on the user’s name to initiate a chat.

> To enable the "New Chat" button in the UI, ensure the `show_new_chat_modal_button` setting is enabled in your
WireChat configuration.

<x-sub-section-heading  label="Creating a Private Chat Programmatically" />

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

If a conversation already exists between the two participants, it will be returned instead of creating a new
one.
___

<x-section-heading label="Chat Creation Permission" />

WireChat provides flexibility to control chat creation on a per-user basis. Models using the `Chatable` trait
can override the `canCreateChats()` method to define custom logic for determining whether a user can initiate
new chats.

```bash{}{8-12}
use Illuminate\Foundation\Auth\User as Authenticatable;
use Namu\WireChat\Traits\Chatable;

class User extends Authenticatable
{
use Chatable;

// Custom logic for allowing chat creation
public function canCreateChats(): bool
{
return $this->hasVerifiedEmail();
}
}
```

If the `canCreateChats()` method returns `false`, the user will be restricted from creating new chats.

**Note:** Restricting chat creation does not prevent the user from:
- Receiving new messages.
- Participating in existing conversations.

---

<x-section-heading label="Sending a Message" />

<x-sub-section-heading  label="Via the WireChat UI" key="Sending message via UI" />

1. Open a chat from your list.
2. Type your message in the message box.
3. Click **Send** or press Enter.


<x-sub-section-heading  label="Sending Programmatically" key="Sending message Programmatically"  />

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

WireChat will validate the user’s authorization to send messages to the conversation and create it if it doesn’t
exist.

---

<x-section-heading label="Managing Conversations" />


<x-sub-section-heading  label="Viewing Conversations:" />

Visit the `/chats` route to see your active conversations. Conversations you’ve deleted, groups you’ve exited,
or blank conversations (no messages) will not appear in the list.


<x-sub-section-heading  label="Programmatically Fetching Conversations:" />

```bash
$auth = auth()->user();
$conversations = $auth->conversations()->get();
```

<x-sub-section-heading  label="Applying Scopes:" />

1. Exclude Blank Conversations:

```bash
$conversations = $auth->conversations()->withoutBlanks()->get();
```

2. Exclude Deleted Conversations:

```bash
$conversations = $auth->conversations()->withoutDeleted()->get();
```
**Note:** For these scopes to take effect , the user must be authenticated

---

<x-section-heading label="Clearing Conversations" />

Clearing a conversation removes all messages for you but keeps the conversation in the list.

#### UI Instructions:

1. Open a chat.
2. Select **Clear Chat History** from the menu or **Chat Info**.

#### Programmatically Clear a Conversation:

```bash
$auth = auth()->user();
$conversation = $auth->conversations()->first();
$conversation->clearFor($auth);
```

---

<x-section-heading label="Deleting Conversations" />

Deleting a conversation removes it from your list and clears its messages. For private chats, it will remain
deleted and excluded from list unless another message is sent or received.

#### UI Instructions:

1. Open a chat.
2. Select **Delete Chat** from the menu or **Chat Info**.

#### Programmatically Delete a Conversation:

```bash
$auth = auth()->user();
$conversation = $auth->conversations()->first();
$conversation->deleteFor($auth);
```

> Conversations are permanently deleted if all participants delete them or if it's a self-chat.

---

<x-section-heading label="Additional Features" />

#### Check User Membership in a Conversation:

```php
$user->belongsToConversation($conversation); // Returns bool
```

#### Check Existing Conversations with Another User:

```bash
$user->hasConversationWith($anotherUser); // Returns bool
```


</x-markdown>

    <x-slot name="subNavigation">
        <x-sub-navigation :items="[
            'Getting Started',
            'Starting a Chat' => [
                'Using the WireChat UI' => 'Starting Chat Using the WireChat UI',
                'Creating a Private Chat Programmatically'
            ],
            'Chat Creation Permission',
            'Sending a Message'=>[
                'Via the WireChat UI'=>'Sending message via UI',
                'Sending Programmatically'=>'Sending message Programmatically'
            ],
            'Managing Conversations '=>[
                'Viewing Conversations',
                'Programmatically Fetching Conversations',
                'Applying Scopes'

            ],
            'Clearing Conversations',
            'Deleting Conversations',
            'Additional Features',
        ]" />
    </x-slot>

</x-docs-layout>

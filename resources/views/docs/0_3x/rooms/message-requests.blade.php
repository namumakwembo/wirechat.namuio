<x-docs-layout>

<x-markdown>

# Message Requests

Wirechat message requests let you start a private conversation without immediately adding the recipient as a participant. The sender gets a normal private conversation thread, the recipient gets access to review it, and they can then **accept** or **reject** the request from inside the chat.

This is built on top of the same polymorphic join-request system already used by groups. It does **not** introduce a new conversation type or a separate request table just for private chats.

---

<x-section-heading label="How It Works" />

At a high level, a message request is still a normal private conversation:

- A private `Conversation` record is created.
- The sender is added to `participants`.
- The recipient is **not** added to `participants` yet.
- A pending `JoinRequest` is attached directly to that conversation.

That means the thread already exists, but membership is incomplete until the recipient accepts it.

---

<x-section-heading label="Database Model" />

No new migration is required for message requests if your application already has the standard Wirechat tables.

Wirechat reuses the existing tables:

- `wirechat_conversations`
- `wirechat_participants`
- `wirechat_messages`
- `wirechat_join_requests`

The important part is the existing polymorphic `join_requests` table. For private message requests, the `joinable_type` and `joinable_id` point to a `Conversation` instead of a `Group`.

So technically:

- The conversation stays `private`.
- The pending state lives in `join_requests.status`.
- Accepting the request creates or restores the recipient's participant row.
- Rejecting the request marks that join request as dismissed.

---

<x-section-heading label="Creating Message Requests" />

<x-sub-section-heading label="Using the UI" />

The standard new-chat flow can be used to create message requests:

1. Enable the chat action in your panel.
2. Click the **Plus** icon in the chats header.
3. Search for a user.
4. Select that user.

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->createChatAction();
}
```

In the current implementation, the new-chat component uses the message-request flow for private chat creation.

<x-sub-section-heading label="Programmatically" />

Use `createMessageRequestConversationWith()` when you want to explicitly create the request-based flow:

```php
$auth = auth()->user();
$otherUser = User::first();

$conversation = $auth->createMessageRequestConversationWith($otherUser);
```

If a matching private conversation or pending request already exists, Wirechat reuses it instead of creating a duplicate thread.

---

<x-section-heading label="Recipient Experience" />

The recipient can open the conversation even before becoming a participant.

Inside the chat:

- They can read the existing messages in the request thread.
- They do **not** get the normal composer yet.
- The footer shows **Accept** and **Reject** actions instead.

If they accept:

- They are added to the conversation participants.
- The pending join request is marked as accepted.
- They can start replying immediately.

If they reject:

- They are not added to the participants table.
- The request is marked as dismissed.
- The chat closes and disappears from the pending request view.

---

<x-section-heading label="Requests Filter" />

Pending requests can be surfaced from the chats header through the **Requests** filter button.

When the filter is active:

- The list only shows private conversations that currently have a pending join request for the signed-in user.
- Blank requests can still appear, even if the sender has not written the first message yet.

When the filter is inactive:

- The normal conversation list keeps its usual behavior for blank conversations and deleted threads.

---

<x-section-heading label="Access Rules" />

Message requests slightly relax the normal private-chat access rules.

Normally, a user needs to belong to the conversation through the `participants` table. For pending message requests, Wirechat also allows access when:

- The conversation is private.
- The signed-in user matches a pending join request attached to that conversation.

This is why the recipient can read the thread before accepting it, while still being blocked from sending messages until the request is approved.

---

<x-section-heading label="Related APIs" />

The message-request flow is mainly built around these APIs:

```php
$user->createMessageRequestConversationWith($peer);

$conversation->createMessageRequestFor($user);
$conversation->acceptMessageRequestFor($user);
$conversation->dismissMessageRequestFor($user);

$user->canAccessConversation($conversation);
$conversation->canBeAccessedBy($user);
```

Use `createConversationWith()` when you want an immediate private conversation with both participants already attached. Use `createMessageRequestConversationWith()` when you want the review-and-accept flow instead.

</x-markdown>

<x-slot name="subNavigation">
    <x-sub-navigation :items="[
        'How It Works',
        'Database Model',
        'Creating Message Requests' => [
            'Using the UI',
            'Programmatically',
        ],
        'Recipient Experience',
        'Requests Filter',
        'Access Rules',
        'Related APIs',
    ]" />
</x-slot>

</x-docs-layout>


<x-docs-layout>

<x-markdown>

# Events

WireChat uses events to notify users in real-time when key actions occur, such as when a new message is created. These events help update the chat interface and notify participants who might not be actively engaged in the conversation.

<x-section-heading label="MessageCreated Event"/>

The `MessageCreated` event is triggered when a new message is created. It is broadcast over the private channel `private-{panel}.conversation.{id}`, where `{panel}` is the panel ID and `{id}` is the unique identifier of the conversation. This event ensures that all participants in the conversation receive real-time updates.

The event is only accessible to users who are part of the conversation, and access is validated by checking if the authenticated user belongs to the conversation.

You can listen to this event using [Laravel Echo](https://laravel.com/docs/11.x/broadcasting#client-side-installation).

**Example: Broadcasting the Event**

```php
$message = $auth->sendMessageTo($otherUser);

broadcast(new MessageCreated($message));
````

**Broadcasting to a Panel**
By default, the default panel will be used to send broadcasts. However, you can also specify a panel to broadcast the message to:

```php
$message = $auth->sendMessageTo($otherUser);

broadcast(new MessageCreated(message: $message, panel: 'admin'));
```

---

<x-section-heading label="NotifyParticipant Event"/>

Some participants may not be actively viewing a conversation but still need to be notified about new messages. The `NotifyParticipant` event is broadcast over the private channel `private-{panel}.participant.{type}.{id}` to notify each participant individually.

The `{type}` and `{id}` in the channel represent the participant's model type and identifier. This distinction is necessary because WireChat supports participants from different models. The participant is validated by ensuring that `{type}` matches the authenticated user’s `morphClass` and `{id}` matches their model key. This ensures notifications are sent to the correct participants.

**Broadcasting the Event**

```php
$message = $auth->sendMessageTo($otherUser);
broadcast(new NotifyParticipant($otherUser, $message));
```

**Broadcasting via Panel**

```php
$message = $auth->sendMessageTo($otherUser);
broadcast(new NotifyParticipant(participant: $otherUser, message: $message, panel: 'chats'));
```

---

<x-section-heading label="Recap of Events"/>

| **Event**                                | **Description**                                                                                                   |
| ---------------------------------------- | ----------------------------------------------------------------------------------------------------------------- |
| `Namu\WireChat\Events\MessageCreated`    | Broadcasts to `private-{panel}.conversation.{id}` when a message is sent, updating the conversation in real-time. |
| `Namu\WireChat\Events\NotifyParticipant` | Broadcasts to `private-{panel}.participant.{type}.{id}` to notify a specific participant of a new message.        |

---

<x-section-heading label="Listening to Events"/>

WireChat emits events that allow you to respond in real-time when important actions occur, such as a new message being sent or a participant being notified. By listening for these events, you can update the UI, trigger notifications, or execute custom logic.

You can handle events on both the **client side** (in your JavaScript frontend) and the **server side** (using Laravel event listeners).

---

<x-sub-section-heading label="Client-Side (Using Laravel Echo)" key="Listening To Client-Side Events (Using Laravel Echo)"/>

On the client side, you can use [Laravel Echo](https://laravel.com/docs/11.x/broadcasting#client-side-installation) to listen for broadcasted events. This allows you to update the UI dynamically without needing a page refresh.

**Setting Up Laravel Echo**

Before listening for events, ensure Laravel Echo and Pusher (or another broadcasting driver) are properly set up in your frontend. If you haven't installed them yet, follow the Laravel broadcasting documentation.

**Example: Listening for `NotifyParticipant`**

WireChat provides a helper function to standardize morph class serialization:
`Namu\WireChat\Helpers\MorphClassResolver::encode()`.

This ensures model types are correctly encoded in an alphanumeric format for use in private channels.

@verbatim

```js
// JavaScript
userId = @js(auth()->id());
encodedType = @js(\Namu\WireChat\Helpers\MorphClassResolver::encode(auth()->user()->getMorphClass()));
panel = 'chats'; // or set your custom panel

Echo.private(`${panel}.participant.${encodedType}.${userId}`)
.listen('.Namu\\WireChat\\Events\\NotifyParticipant', (e) => {
console.log(e);
});
```

@endverbatim

**Handling Events in Your UI**

Once you receive an event, you can:

* Update the chat UI in real-time.
* Display notifications to users.

---

<x-sub-section-heading label="Server-Side Listeners"/>

On the server side, you can listen for events using Laravel’s event system. This is useful for handling background tasks such as sending email notifications when a message is created.

**Example: Registering a Listener for `MessageCreated`**

In your `AppServiceProvider`, map the `MessageCreated` event to a listener:

```php
public function boot(): void
{
    Event::listen(
      \Namu\WireChat\Events\MessageCreated::class,
      SendEmailNotification::class,
    );
}
```

In this example, the `SendEmailNotification` listener will be triggered whenever a new message is created. You can use this to send an email, log activity, or perform other background actions.

By combining **client-side** and **server-side** listeners, you can build a fully interactive and responsive chat experience.

</x-markdown>

<x-slot name="subNavigation">

<x-sub-navigation :items="[
'MessageCreated Event',
'NotifyParticipant Event',
'Recap of Events',
'Listening to Events'=>[
 'Client-Side (Using Laravel Echo'=>'Listening To Client-Side Events (Using Laravel Echo)',
 'Server-Side Listeners'
]]"/>

</x-slot>

</x-docs-layout>

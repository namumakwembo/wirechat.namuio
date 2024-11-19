
<x-docs-layout>

<x-markdown> 
 
## Events

In the `WireChat` package, events are broadcasted to notify users in real-time when certain actions, such as message creation, occur. The events are used to update the chat interface or notify participants who might not be actively engaged in the conversation.

### MessageCreated Event

When a message is created, the `MessageCreated` event is triggered and broadcasted over a private channel `private-conversation.{id}`, where `{id}` is the conversation's unique identifier. This event is used to quickly update the chat interface in real time for all participants within the conversation. The event is only available to users who are part of the conversation, and the channel is validated by checking if the authenticated user belongs to the conversation.

This event is crucial for updating the chat interface as soon as a new message is sent. It can be listened to through [Laravel Echo](https://laravel.com/docs/11.x/broadcasting#client-side-installation).

#### Example of Event Broadcasting:

```php
...
$message= $auth->sendMessageTo($otherUser);
broadcast(new MessageCreated($message));
```

### NotifyParticipant Event

In some cases, users may not be active in a conversation but still need to be notified about new messages. The `NotifyParticipant` event is broadcasted over a private channel `private-participant.{id}`, notifying all participants individually. This event can be used to notify participants about new messages, even if they are not currently viewing the conversation.

The channel is validated by checking if the `id` in the route matches the authenticated user's ID, ensuring that notifications are sent to the correct participants.

#### Example of Event Broadcasting:
```php
...
$message= $auth->sendMessageTo($otherUser);
broadcast(new NotifyParticipant($otherUser,$message));
```

### Recap of Events

| **Event**                                      | **Description**                                                                                         |
| ---------------------------------------------- | ------------------------------------------------------------------------------------------------------- |
| `Namu\WireChat\Events\MessageCreated`          | Triggered when a message is created/sent, and broadcast to the `private-conversation.{id}` channel.       |
| `Namu\WireChat\Events\NotifyParticipant`       | Triggered when a message is created/sent, broadcast to the `private-participant.{id}` channel to notify participants. |

---

### Listening to Events

To update your application's UI or perform certain actions based on these events, you can listen to them using [Laravel Echo](https://laravel.com/docs/11.x/broadcasting#client-side-installation) . For example, you can update the unread messages count or display a pop-up notification when a new message is received.

#### Example of Listening to `NotifyParticipant` Event:
```javascript
Echo.private('private-participant.${userId}')
      .listen('.Namu\\WireChat\\Events\\NotifyParticipant', (e) => {
         // Increment unread messages count or trigger a notification
         console.log('New message from: ', e.message.id);
      });
```

In this case, you are listening to the `NotifyParticipant` event on a private channel specific to the authenticated user. When the event is triggered, you can handle the response in the event listener.

### Sending Notifications or Emails

If you want to send email notifications or handle additional logic when a message is created, you can create a listener that listens to the `MessageCreated` event. For instance, you may want to send an email to all participants notifying them of a new message in the conversation.

#### Example of Listener Registration in `EventServiceProvider`:

In your `AppServiceProvider`, you can map the `MessageCreated` event to a listener that handles email notifications or other actions.


```php

public function boot(): void
{
    Event::listen(
      \Namu\WireChat\Events\MessageCreated::class,
        SendEmailNotification::class,
    );
}
```

In this example, the `SendEmailNotification` listener will be triggered every time a `MessageCreated` event is broadcasted, allowing you to implement additional logic such as sending an email.


</x-markdown>

    


</x-docs-layout>
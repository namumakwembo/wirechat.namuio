

<x-docs-layout>

<x-markdown>

# Aggregations

This section demonstrates how to retrieve aggregate data, like message counts, to enhance data handling and performance.

### Get Unread Message Counts

Retrieve the count of unread messages across all conversations or within a specific conversation.

Get Total Unread Messages Count for the User

```php 
$user->getUnreadCount(); // int
```

Get Unread Messages Count for a Specific Conversation

```php
$conversation = $user->conversations()->first();
$user->getUnreadCount($conversation); // int
```

### Using `withCount()`

Leverage the `withCount()` method to get the count of related models.

```php

namespace Namu\WireChat\Models\Conversation;

$conversations = Conversation::withCount('messages','participants')->get();

foreach ($conversations as $conversation) {
    echo $conversation->messages_count;
    echo $conversation->participants_count;

}
```

### Preventing N+1 Issues

Use **eager loading** with the `with()` method to load related data in a single query and prevent N+1 issues.

```php
$user = auth()->user();
$conversations = $user->conversations()->with('messages','lastMessage','participants')->get();
```

</x-markdown>



</x-docs-layout>
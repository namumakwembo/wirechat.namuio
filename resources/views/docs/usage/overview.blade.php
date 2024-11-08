
<x-docs-layout>

<x-markdown> 
## Overview

After intalling and setting up wirechat configurations it's time to now use it 
You can now simply visit the url `http://127.0.0.1:8000/chats` in order to start chatting 

---

### Getting started

Before you can start using Wirechat  you need to make sure you add the trait to your User model , Wirechat is polymorphic so you can 
add the wirechat trait to any model you want to enable chating

`Namu\WireChat\Traits\Chatable`
```
use Illuminate\Foundation\Auth\User as Authenticatable;
use Namu\WireChat\Traits\Chatable;

class User extends Authenticatable
{
    use Chatable;

    ...
}

```

### Extending functionality

Sometimes you may want to use the wirechat outside it's default interface , Here are the methods provided by the `WireChat` Trait

### Trait Methods

1. **Get Conversations**

   Retrieves all conversations associated with the authenticated user.
   ```php
   //Returns Collection of Conversation models.
   $conversations = $user->conversations()->get();
   ```

2. **Send Message to a User**

   Sends a message to another user. If no conversation exists between the two users, a new one will be created.

   ```php
   //Returns Created Message model
   $user->sendMessageTo($anotherUser, 'message'); 
   ```

3. **Send Message to a Conversation**

   Sends a message directly to an existing conversation or group. If the user is not a participant, no message is created.
 
   ```php
   //Returns Created Message model
   $user->sendMessageTo($conversation, 'message'); 
   ```

4. **Create or Retrieve Conversation with a User**

   Creates a new conversation with another user. If a conversation already exists, it returns the existing one.

   ```php
   //Returns The Conversation model (existing or newly created).
   $user->createConversationWith($anotherUser, 'message'); 
   ```

5. **Check if User Belongs to a Conversation**

   Determines if the authenticated user is a participant in a specified conversation.

   ```php
   // Returns bool
   $user->belongsToConversation($conversation); 
   ```

6. **Check if User Has a Conversation with Another User**

   Checks whether the authenticated user has an existing conversation with a specified user.

   ```php
   // Returns bool
   $user->hasConversationWith($anotherUser);
   ```

7. **Delete Conversation**

   Deletes or hides a conversation for the authenticated user. Messages will remain accessible to other participants until they also delete the conversation.

   ```php
   $user->deleteConversation($conversation);
   ```

8. **Exit a Group or Channel Conversation**

   Allows the authenticated user to leave a group or channel conversation by marking their participant record as exited. After exiting, the user will no longer be able to send or receive messages in this conversation. Note: For private conversations, users cannot exit.

   ```php
   $user->exitConversation($conversation);
   ```


</x-markdown>

    


</x-docs-layout>
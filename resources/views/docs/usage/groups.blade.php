
<x-docs-layout>

<x-markdown>

### Groups

WireChat offers a **Group** feature that allows users to participate in conversations with multiple participants, beyond 1-on-1 private chats.

#### Create a Group

This will also add the $user who created the group as first participant with `OWNER` role

```php
// Returns the Conversation model for the created group.
$conversation = $user->createGroup('Group Name', 'Description', $photo);
```

#### Participant Roles and Permissions

WireChat supports different participant roles, such as **Owner** and **Admin**, allowing you to check and manage permissions within groups.


```php
//Check if User is an Admin in a Group
$user->isAdminInGroup($group); // bool

//Check if User is the Owner of a Group
$user->isOwnerOfGroup($group); // bool
```

#### Add Participants to Group

Once a group is created, you can add new participants directly to the group.
```php
// Add a user or model to the group as a participant.
$conversation->addParticipant($user);
```

</x-markdown>

</x-docs-layout>
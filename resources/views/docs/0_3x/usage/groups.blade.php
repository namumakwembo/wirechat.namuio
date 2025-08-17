
<x-docs-layout>

<x-markdown>

# Groups

WireChat's **Group** feature transforms simple messaging into a dynamic, multi-user conversation experience. Groups empower users to collaborate effectively by offering robust tools for managing members, assigning roles, and customizing permissions. Whether you're creating communities or coordinating projects, WireChat Groups provide the flexibility and control you need.

---

## Enabling Group Creation

To allow users to create groups in your application, ensure the following settings are enabled in the WireChat [configuration]({{route('customization.config')}}):

- `show_new_group_modal_button`
- `show_new_chat_modal_button`

>**Note:** Disabling these settings will hide the action buttons required for group creation, preventing all users from initiating new groups.


---
    

## Creating a Group

Creating a group allows users to set up a shared space where multiple participants can communicate. Group creators can define details, manage members, and configure roles for streamlined interactions.


#### Group creation via UI:

1. Click the **Plus** icon in the Chats Component.
2. Select **New Group**.
3. Fill in the group details:
    - **Group Name**: (Required) Limited to 100 characters.
    - **Description**: Optional.
    - **Group Icon**: Add an image by clicking the camera icon. Once set, this icon will appear alongside the group in the chats list.
4. Click **Next** after entering the details.
5. Select members by searching or choosing from the list. _(Customize the returned users; see [Trait Customization]({{route('customization.trait')}}))_
6. Click **Create**.


#### Programmatically:

```php
// Create a group and get the Conversation model.
$conversation = $user->createGroup(
    name: 'Group Name',
    description: 'Description',
    photo: $photo
);
```

---

## Group Participant Roles

WireChat supports hierarchical roles, enhancing group management:

- **Owner**: The creator of the group, with full administrative privileges.
- **Admin**: Appointed members with elevated permissions.
- **Participant**: General members of the group.


**Examples of Role Checks:**

```php
// Check if a user is an Admin
$conversation->isAdmin($user); // bool

// Check if a user is the Owner
$conversation->isOwner($user); // bool
```

The creator of a group is automatically assigned the `OWNER` role

---

## Managing Group Members

Groups support dynamic membership management, allowing admins and members (depending on permissions) to add or remove participants.

### Adding Members

**To Add Members via UI:**

1. Open the group chat and click the group name.
2. In **Group Info**, click **Add Members**.
3. Search or select users to add. _(Customize the returned users; see [Trait Customization]({{route('customization.trait')}}))_
4. Click **Save**.

**To Add Members Programmatically:**

```php
// Add a user or model to a group.
$conversation->addParticipant($user);
```

> **Note**: If a member was previously removed by an admin, only admins can re-add them. Attempting to re-add them via UI without admin rights will throw an error.

However you can also re-add members removed by Admin programatically by passing paramter  ` undoAdminRemovalAction: true`
```php
// Re-add a member previously removed by an admin
$conversation->addParticipant($user, undoAdminRemovalAction: true);
```

### Removing Members

Only admins can remove members, excluding the group owner.

**To Remove Members via UI:**

1. Open the group chat and click the group name.
2. Under **Group Info**, select **Members**.
3. Find the member to remove and click **Remove**.

**Effect of Removal:**

- Admins lose their role upon removal.

---

## Exiting a Group

All members, except the owner, can exit a group.

#### Exit group via UI:

1. Open the group chat.
2. Click the three vertical **Dots** menu, then select **Exit Group**.
    - Alternatively, open the group name in **Group Info** and select **Exit Group**.

#### Exit Programmatically:

```php
// Exit a group conversation
$user->exitConversation($conversation);
```

> **Note**: Once a member exits, they cannot be re-added, even by admins. Admins exiting the group lose their admin privileges.

---

## Group Permissions

Group permissions allow owners to control who can perform specific actions, such as editing group information, sending messages, or adding members.

By default:

- All members can send messages and add others.
- Only admins can edit group information (e.g., name, icon, and description).

#### Editing Group Permissions

1. Open the group chat and click the group name.
2. Select **Group Permissions**.
3. Adjust the settings:
    - **Add Members**: Allow all members or only admins to add participants.
    - **Send Messages**: Allow all members or only admins to send messages.
    - **Edit Group Info**: Allow all members or only admins to edit the group's details.

</x-markdown>

</x-docs-layout>
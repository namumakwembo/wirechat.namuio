
<x-docs-layout>

<x-markdown>

# Groups

WireChat's **Group** feature transforms simple messaging into a dynamic, multi-user conversation experience. Groups empower users to collaborate effectively by offering robust tools for managing members, assigning roles, and customizing permissions. Whether you're creating communities or coordinating projects, WireChat Groups provide the flexibility and control you need.

---
<x-section-heading label="Enabling Group Creation" />

To allow users to create groups in your application, enable the required actions in your Wirechat **panel**:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    $panel
        //...
        ->createChatAction()
        ->createGroupAction();
}
```

> **Note:** Disabling these actions will hide the buttons required for creating new groups in the UI.



---

<x-section-heading label="Group Settings" />

Panels let you configure **group settings**, so you can define different rules and limits for each panel.

<x-sub-section-heading label="Maximum Group Members" />

This option controls how many members a group can have within the panel.

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        //...
        ->maxGroupMembers(1000);
}
```


---


<x-section-heading label="Creating a Group" />

Creating a group allows users to set up a shared space where multiple participants can communicate. Group creators can define details, manage members, and configure roles for streamlined interactions.

<x-sub-section-heading label="Group creation via UI" />

1. Click the **Plus** icon in the Chats Component.
2. Select **New Group**.
3. Fill in the group details:
    - **Group Name**: (Required) Limited to 100 characters.
    - **Description**: Optional.
    - **Group Icon**: Add an image by clicking the camera icon. Once set, this icon will appear alongside the group in the chats list.
4. Click **Next** after entering the details.
5. Select members by searching or choosing from the list.
6. Click **Create**.


<x-sub-section-heading label="Programmatically" />

```php
// Create a group and get the Conversation model.
$conversation = $user->createGroup(
    name: 'Group Name',
    description: 'Description',
    photo: $photo
);
```

---
<x-section-heading label="Group Participant Roles" />

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

<x-section-heading label="Managing Group Members" />

Groups support dynamic membership management, allowing admins and members (depending on permissions) to add or remove participants.


<x-sub-section-heading label="Adding Members" />

**To Add Members via UI:**

1. Open the group chat and click the group name.
2. In **Group Info**, click **Add Members**.
3. Search or select users to add.
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

<x-sub-section-heading label="Removing Members" />

Only admins can remove members, excluding the group owner.

**To Remove Members via UI:**

1. Open the group chat and click the group name.
2. Under **Group Info**, select **Members**.
3. Find the member to remove and click **Remove**.

**Effect of Removal:**

- Admins lose their role upon removal.

---

<x-section-heading label="Exiting a Group" />

All members, except the owner, can exit a group.


<x-sub-section-heading label="Exit group via UI:" />

1. Open the group chat.
2. Click the three vertical **Dots** menu, then select **Exit Group**.
    - Alternatively, open the group name in **Group Info** and select **Exit Group**.


<x-sub-section-heading label="Exit Programmatically:" />

```php
// Exit a group conversation
$user->exitConversation($conversation);
```

> **Note**: Once a member exits, they cannot be re-added, even by admins. Admins exiting the group lose their admin privileges.

---

<x-section-heading label="Group Permissions" />

Group permissions allow owners to control who can perform specific actions, such as editing group information, sending messages, or adding members.

By default:

- All members can send messages and add others.
- Only admins can edit group information (e.g., name, icon, and description).


<x-sub-section-heading label="Editing Group Permissions" />

1. Open the group chat and click the group name.
2. Select **Group Permissions**.
3. Adjust the settings:
    - **Add Members**: Allow all members or only admins to add participants.
    - **Send Messages**: Allow all members or only admins to send messages.
    - **Edit Group Info**: Allow all members or only admins to edit the group's details.

</x-markdown>
    <x-slot name="subNavigation">
        <x-sub-navigation
          :items="[
                'Enabling Group Creation',

                'Group Settings' => [
                'Maximum Group Members',
                ],

                'Creating a Group' => [
                    'Group creation via UI',
                    'Programmatically',
                ],

                'Group Participant Roles',

                'Managing Group Members' => [
                    'Adding Members',
                    'Removing Members',
                ],

                'Exiting a Group' => [
                    'Exit group via UI:',
                    'Exit Programmatically:',
                ],

                'Group Permissions' => [
                    'Editing Group Permissions',
                ],
        ]"

        />

    </x-slot>
</x-docs-layout>

<x-docs-layout>

<x-markdown>

# Groups

WireChat **Groups** turn simple messaging into a moderated, multi-user room system. In addition to members, roles, and message permissions, groups can expose invite links, approval-driven joins, public invite pages, and admin-only moderation tools for past and blocked members. This page is written for developers, so it focuses on behavior, lifecycle, access control, and the security assumptions behind the feature set.

---
<x-section-heading label="Enabling Group Creation" />

To allow users to create groups in your application, enable the required actions in your Wirechat **panel**:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->createChatAction()
        ->createGroupAction();
}
```

> **Note:** Disabling these actions hides the UI entry points required for creating new groups.
> `createGroupAction()` is usually paired with `createChatAction()` because the group option is rendered inside the new-chat modal. See the [Actions]({{ docs()->route('actions') }}) page for the full action API.

---
<x-section-heading label="Group Settings" />

Panels let you define group behavior per panel, so different panels can have different creation rules, limits, invitation policies, layouts, and authorization boundaries.

<x-sub-section-heading label="Maximum Group Members" />

This option controls how many members a group can have within the current panel.

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->maxGroupMembers(1000);
}
```

<x-sub-section-heading label="Enabling Group Invitations" />

Invite links are opt-in at the panel level. When enabled, WireChat exposes the group invite UI, invite routes, join-request flow, and invite-specific moderation tools.

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->groupInvitations();
}
```

When the feature is disabled:

- Invite management actions are hidden from group info.
- Invite routes return `404`.
- Invite-related Livewire components should be considered unavailable.

<x-sub-section-heading label="Customizing the Invite Page Layout" />

Invite links can be opened by guests or by authenticated users who are outside your protected chat area. Because of that, the invite preview page should use a layout that is safe to render publicly.

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->groupInvitations()
        ->invitePageLayout('wirechat::layouts.app');
}
```

Use a layout that does **not** assume your normal chat shell, admin dashboard layout, or any route that requires authenticated panel access. The invite preview page is intentionally public-facing, while the actual join is finalized inside the chat application.

<x-sub-section-heading label="Invite Join Redirects (Widget Support)" />

Invite joins normally redirect users into the panel's chat index. If your app hosts WireChat as a **widget** on a dedicated page, you can override that redirect so invite joins land on the page that actually renders the widget.

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        // ...
        ->groupInvitations()
        ->inviteJoinRedirect(fn () => route('wirechat.widget'));
}
```

When the invite lobby opens inside a widget, it opens the joined group inside the widget and closes the modal instead of redirecting the browser.

---
<x-section-heading label="Creating a Group" />

Creating a group gives users a shared space where multiple participants can communicate, assign roles, manage members, and control who can perform sensitive actions.

<x-sub-section-heading label="Group creation via UI" />

1. Click the **Plus** icon in the chats component.
2. Select **New Group**.
3. Fill in the group details:
   - **Group Name**: Required, limited to 100 characters.
   - **Description**: Optional.
   - **Group Icon**: Optional image shown in the chats list and group header.
4. Click **Next**.
5. Select members by searching or choosing from the list.
6. Click **Create**.

<x-sub-section-heading label="Programmatically" />

```php
// Create a group and receive the Conversation model.
$conversation = $user->createGroup(
    name: 'Product Launch',
    description: 'Cross-team launch room',
    photo: $photo,
);
```

---
<x-section-heading label="Group Participant Roles" />

WireChat supports hierarchical group roles:

- **Owner**: The creator of the group. Owners have full administrative control and remain the highest authority for group settings.
- **Admin**: A promoted member with elevated moderation and management permissions.
- **Participant**: A regular group member.

**Common role checks:**

```php
// Check whether a user is an admin.
$conversation->isAdmin($user); // bool

// Check whether a user is the owner.
$conversation->isOwner($user); // bool
```

The creator of a group is automatically assigned the `OWNER` role.

---
<x-section-heading label="Managing Group Members" />

Groups support dynamic membership management, but the exact behavior depends on the participant's history with the room and any moderation actions that were taken previously.

<x-sub-section-heading label="Adding Members" />

Groups can be configured to let all members add others or to restrict that action to admins. In the UI:

1. Open the group chat and click the group name.
2. In **Group Info**, click **Add Members**.
3. Search or select users to add.
4. Click **Save**.

Programmatically:

```php
// Add a user or model to a group.
$conversation->addParticipant($user);
```

If group invitations are enabled, the **Add Members** screen can also expose a primary invite link shortcut. This is useful when members are allowed to add others but should not be allowed to manage invite settings directly.

<x-sub-section-heading label="Re-adding and Restoring Members" />

WireChat treats past membership carefully:

- Members who **left on their own** cannot be force-added back by another user, including admins.
- Members who were **blocked by an admin** cannot be re-added until the block is lifted.
- Members who were **removed by an admin** can be intentionally restored programmatically.

```php
// Restore a member who was previously removed by an admin.
$conversation->addParticipant(
    $user,
    undoAdminRemovalAction: true,
);
```

That explicit `undoAdminRemovalAction` flag matters because it forces developers to make a deliberate decision before reversing an admin removal.

<x-sub-section-heading label="Removing Members" />

Only admins can remove members, and the group owner cannot be removed by another admin.

**To remove members via UI:**

1. Open the group chat and click the group name.
2. Under **Group Info**, select **Members**.
3. Find the member and click **Remove**.

**Effect of removal:**

- The participant is removed from the active room.
- Any admin role is cleared as part of the removal lifecycle.
- The participant becomes part of the room's moderation history and is no longer treated as an active member.

<x-sub-section-heading label="Past Members and Blocked Members" />

Admins can inspect historical membership state through dedicated moderation views:

- **Past Members** shows people who previously belonged to the group and records whether they left on their own, were removed by an admin, or were blocked.
- **Blocked Members** shows participants who cannot rejoin until the block is lifted.

These views are useful when you need to explain why someone is missing from add-member search results or why a join action is being rejected.

---
<x-section-heading label="Exiting a Group" />

All members except the owner can exit a group voluntarily.

<x-sub-section-heading label="Exit Group via UI" />

1. Open the group chat.
2. Click the three-dot menu and select **Exit Group**.
   - Alternatively, open **Group Info** and use the **Exit Group** action there.

<x-sub-section-heading label="Exit Programmatically" />

```php
$user->exitConversation($conversation);
```

> **Important:** When a user exits by choice, they cannot be force-added back by another member or admin. They must decide to return themselves, usually through an invite link.

---
<x-section-heading label="Group Permissions" />

Group permissions control who can perform sensitive actions, such as editing group information, sending messages, adding members, and approving new participants.

By default:

- All members can send messages and add others.
- Only admins can edit group information.
- Invite-based joins can be made approval-driven when the group owner enables it.

<x-sub-section-heading label="Editing Group Permissions" />

1. Open the group chat and click the group name.
2. Select **Group Permissions**.
3. Adjust the settings:
   - **Add Members**: Allow all members or only admins to add participants.
   - **Send Messages**: Allow all members or only admins to send messages.
   - **Edit Group Info**: Allow all members or only admins to edit the group's name, icon, and description.
   - **Approve New Members**: Require admins to review people who arrive through invite links before they join.

<x-sub-section-heading label="Approval Rules and Group Access" />

Invite approval is derived from two things:

- The group's access mode, such as public vs private access.
- The `admins_must_approve_new_members` flag.

In practice:

- Public groups can allow immediate joins.
- Private-access groups always require a join request.
- Public groups can still require approval if `admins_must_approve_new_members` is enabled.

This means invite links are not automatically equivalent to direct membership. The group configuration still decides whether a valid invite produces a **join** or a **join request**.

---
<x-section-heading label="Group Invitations" />

Group invitations provide a structured way to share access without directly adding people into the room. They are designed to work with guest previews, in-app joins, join-request review, and moderation history.

<x-sub-section-heading label="Workflow Overview" />

The invitation flow is intentionally split into multiple stages:

1. An admin or owner opens the invite management UI.
2. WireChat ensures the group has an active **primary invite link**.
3. Additional links can be created with their own name, usage limit, and expiry.
4. A shared invite URL opens a public preview page under the current panel.
5. The join form posts to a dedicated invite join route instead of joining on `GET`.
6. The join route stores the invite token in session and redirects the user into the panel's chats page.
7. The in-app join modal re-validates the invite and the participant's current state before allowing a direct join or creating a join request.

This separation keeps the public page simple and makes the final membership decision inside the authenticated chat experience.

<x-sub-section-heading label="Authorization Rules" />

Invite management is intentionally narrower than basic member addition:

- **Owners and admins** can open the invite-links drawer.
- **Owners and admins** can create extra links, reset links, send links through chat, and review join requests.
- **Only owners** can jump from invite management into group-permission editing.
- **Members who are allowed to add others** may still copy the primary invite link from the **Add Members** UI, but they do not get invite-management access.
- **Non-admin participants** should never be able to open invite-management or join-request moderation components directly.

This keeps link generation and moderation within an administrative boundary while still allowing lightweight sharing when your group rules permit it.

<x-sub-section-heading label="Invite Data Model" />

Invite links are stored as dedicated records rather than as generic actions. The core records are:

| Model | Purpose | Important fields |
| --- | --- | --- |
| `Invite` | A shareable group access link | `panel_id`, `inviteable_id`, `inviteable_type`, `created_by_id`, `created_by_type`, `token`, `name`, `limit`, `usages`, `is_primary`, `expires_at`, `last_used_at`, `revoked_at` |
| `JoinRequest` | A reviewable request created by invite-driven joins when approval is required | `joinable_id`, `joinable_type`, `requester_id`, `requester_type`, `invite_id`, `status`, `reviewed_by_id`, `reviewed_by_type`, `reviewed_at`, `data` |

The `JoinRequestStatus` enum supports:

- `pending`
- `accepted`
- `dismissed`

Both models are polymorphic on purpose, so the same structure can support more than one joinable resource type over time.

<x-sub-section-heading label="Creating and Resolving Invite Links" />

In most applications, invite links are provisioned by the UI. For seeding, admin tooling, or advanced workflows, you can also create them manually:

```php
use Wirechat\Wirechat\Models\Invite;

$invite = $conversation->group->inviteLinks()->create([
    'panel_id' => $panel->getId(),
    'created_by_id' => $user->getKey(),
    'created_by_type' => $user->getMorphClass(),
    'token' => Invite::generateToken(),
    'name' => 'Launch Team',
    'limit' => 25,
    'is_primary' => false,
    'expires_at' => now()->addDay(),
]);

$url = $invite->url($panel);
```

Important invite behaviors:

- The primary link is the default link for the group.
- Resetting a primary link revokes the previous one and generates a replacement.
- Additional links can carry their own `name`, `limit`, and `expires_at` values.
- `Invite::isActive()` returns `false` when a link is revoked, expired, or has reached its usage limit.
- `Invite::markUsed()` increments `usages` and updates `last_used_at`.

Because links are panel-scoped, the same token is also resolved against `panel_id`, not only against the raw token value.

<x-sub-section-heading label="Public Invite Pages and In-App Handoff" />

Invite preview pages are intentionally public so that users can inspect a group before opening the app experience. The preview page shows the group identity and posts to the join endpoint with CSRF protection.

From there, WireChat stages the invite token in session and redirects the user into the chats index for the current panel. The in-app modal then decides whether the user should:

- Join immediately.
- Submit a join request.
- Be blocked from joining.
- Be redirected into the room because they are already eligible to rejoin.

This handoff pattern avoids mutating membership state on a `GET` request and gives the application one final chance to re-check the user's current participant history.

If you override the invite join redirect for widget support, the same handoff still applies. The only difference is the redirect target, which should point to the page that renders the widget.

<x-sub-section-heading label="Sending Invite Links Through Chat" />

Admins can send invite links into one-to-one chats using the share modal. This is useful when you want to invite someone without forcing them into the group immediately.

A few important developer-facing details:

- The user search in the share modal follows the panel's configured user-search pipeline.
- Past members and blocked members are intentionally excluded from share-link search results.
- A sent invite link is just a message containing the link. It does **not** silently restore group membership.
- Users who left, were removed, or were blocked must still pass through the normal invite flow themselves.

<x-sub-section-heading label="Join Requests" />

A valid invite does not always produce an immediate join. When approval is required, WireChat creates a dedicated `JoinRequest` record instead.

```php
$request = $conversation->group->requestToJoin($user, $invite);

$conversation->group->acceptPendingJoinRequest(
    $user,
    reviewedBy: $admin,
    markInviteUsed: true,
);

$conversation->group->dismissPendingJoinRequest(
    $user,
    reviewedBy: $admin,
);
```

Important join-request behaviors:

- Duplicate pending requests are not endlessly recreated. If the user already has a pending request, the existing request is refreshed with the latest invite metadata.
- Accepting a request sets the status to `accepted`, stores reviewer metadata, and can mark the invite as used.
- Dismissing a request stores reviewer metadata and sets the status to `dismissed`.
- Creating a join request does **not** increment invite usages. Usage should only move when the join is actually accepted.

<x-sub-section-heading label="Past Members, Removed Members, and Blocks" />

Invite links respect prior moderation actions.

- Users who **left on their own** cannot be force-added by admins, but they can still choose to rejoin by opening a valid invite link themselves.
- Users who were **removed by an admin** are not silently restored through add-member flows, but they can rejoin themselves through a valid invite link.
- Users who were **blocked by an admin** cannot be re-added or self-join until the block is explicitly lifted.
- Share-link search intentionally keeps exited, removed, and blocked users out of the selectable results so admins do not bypass those rules accidentally.

This distinction matters because "left", "removed", and "blocked" are different security states, not just different UI labels.

<x-sub-section-heading label="Route Helpers and Security" />

WireChat exposes invite route helpers on the panel instance:

```php
$panel->inviteRoute($invite->token);      // GET preview page
$panel->inviteJoinRoute($invite->token);  // POST join handoff
$panel->chatsRoute();                     // Chats index for the panel
```

The invite routes are protected by several layers:

- They are registered under the current panel prefix.
- The token is constrained to `[A-Za-z0-9]{16,64}`.
- Both preview and join routes are rate-limited with the `wirechat-invite` limiter.
- The limiter scopes attempts by request method, IP address, and token.
- Invite resolution checks the current `panel_id` before loading the record.
- Inactive invites return `410 Gone` rather than pretending the link still exists.
- Disabling group invitations at the panel level hides the UI and returns `404` for invite routes.

Finally, invite tokens are generated as unique random strings through `Invite::generateToken()`. They are meant to be compact enough for sharing while still being difficult to guess, and they are always validated again before any membership state is changed.

</x-markdown>

<x-slot name="subNavigation">
    <x-sub-navigation
        :items="[
            'Enabling Group Creation',

            'Group Settings' => [
                'Maximum Group Members',
                'Enabling Group Invitations',
                'Customizing the Invite Page Layout',
                'Invite Join Redirects (Widget Support)',
            ],

            'Creating a Group' => [
                'Group creation via UI',
                'Programmatically',
            ],

            'Group Participant Roles',

            'Managing Group Members' => [
                'Adding Members',
                'Re-adding and Restoring Members',
                'Removing Members',
                'Past Members and Blocked Members',
            ],

            'Exiting a Group' => [
                'Exit Group via UI',
                'Exit Programmatically',
            ],

            'Group Permissions' => [
                'Editing Group Permissions',
                'Approval Rules and Group Access',
            ],

            'Group Invitations' => [
                'Workflow Overview',
                'Authorization Rules',
                'Invite Data Model',
                'Creating and Resolving Invite Links',
                'Public Invite Pages and In-App Handoff',
                'Sending Invite Links Through Chat',
                'Join Requests',
                'Past Members, Removed Members, and Blocks',
                'Route Helpers and Security',
            ],
        ]"
    />
</x-slot>

</x-docs-layout>

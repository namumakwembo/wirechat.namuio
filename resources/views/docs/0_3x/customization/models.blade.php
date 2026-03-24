@php

use function Laravel\Folio\name;

name('docs.customization.models');

@endphp
<x-docs-layout>

<x-markdown>
# Models

Wirechat ships with six core models:
`Conversation`, `Participant`, `Message`, `Group`, `Attachment`, and `Action`.

Together they handle threads, membership, message delivery, uploads, group metadata, and action history.

As of `0.3.x`, Wirechat resolves these model classes from config, which means you can extend them in your app without forking the package.

---

<x-section-heading label="How Model Resolution Works" />

Wirechat resolves the following classes from `config/wirechat.php`:

```php
'models' => [
    'action' => \Wirechat\Wirechat\Models\Action::class,
    'attachment' => \Wirechat\Wirechat\Models\Attachment::class,
    'conversation' => \Wirechat\Wirechat\Models\Conversation::class,
    'group' => \Wirechat\Wirechat\Models\Group::class,
    'message' => \Wirechat\Wirechat\Models\Message::class,
    'participant' => \Wirechat\Wirechat\Models\Participant::class,
],
```

Each configured class must extend the corresponding base Wirechat model.
This is important because the package depends on the inherited relationships, casts, scopes, cleanup hooks, and helper methods.

Recommended approach:

- Extend the base model instead of rewriting it from scratch.
- Keep the package tables and core columns unless you intentionally own the whole Wirechat data layer.
- Preserve relationship names and enum casts because package jobs, UI flows, and scopes call them directly.
- If you override `boot()`, `booted()`, or `__construct()`, call `parent`.
- Add your app-specific logic as extra scopes, relations, traits, accessors, or convenience helpers.

Good customizations:

- Add accessors and convenience methods.
- Add app-specific relationships.
- Add observers or traits.
- Add non-breaking casts or guarded/fillable adjustments that still respect the package schema.

Risky customizations:

- Removing required columns.
- Renaming tables without also updating the full schema contract.
- Replacing relationship methods with incompatible behavior.
- Overriding deletion hooks without preserving package cleanup.

Custom model example:

```php
namespace App\Models;

use Wirechat\Wirechat\Enums\ConversationType;
use Wirechat\Wirechat\Models\Conversation as BaseConversation;

class WirechatConversation extends BaseConversation
{
    protected $casts = [
        'type' => ConversationType::class,
        'updated_at' => 'datetime',
        'disappearing_started_at' => 'datetime',
        'archived_at' => 'datetime',
    ];

    public function supportTicket()
    {
        return $this->belongsTo(\App\Models\SupportTicket::class, 'ticket_id');
    }
}
```

Then register it:

```php
'models' => [
    'conversation' => \App\Models\WirechatConversation::class,
],
```

You do not need a dedicated `App\Models\Wirechat` namespace.
A regular class in `App\Models` works fine as long as it extends the matching Wirechat base model.

---

<x-section-heading label="Conversation" />

`Conversation` is the top-level thread model.
Every private chat, self chat, and group chat starts here.

This is the thread record that coordinates participants, messages, disappearing-message state, and conversation-level visibility rules.

Core fields:

| Field | Purpose |
| --- | --- |
| `id` | Primary key for the thread. |
| `type` | Conversation type enum: private, self, or group. |
| `disappearing_started_at` | When disappearing mode was enabled. |
| `disappearing_duration` | Disappearing duration in seconds. |
| `created_at` | Thread creation timestamp. |
| `updated_at` | Latest activity timestamp used by unread and delete/clear logic. |

### Important relationships

#### `participants(): HasMany`
Returns the membership rows for everyone in the conversation.

```php
$conversation->participants()->with('participantable')->get();
```

#### `messages(): HasMany`
Returns the messages that belong to the conversation.

```php
$conversation->messages()->latest()->get();
```

#### `lastMessage(): HasOne`
Returns the latest message in the conversation, which is useful for conversation lists and previews.

```php
$lastMessage = $conversation->lastMessage;
```

#### `group(): HasOne`
Returns the group metadata row when the conversation is a group thread.

```php
$group = $conversation->group;
```

#### `attachments(): Builder`
Builds an attachment query for all message attachments inside the conversation.

```php
$attachments = $conversation->attachments()->latest()->get();
```

### Important helpers

#### `participant(Model|Authenticatable $user, bool $withoutGlobalScopes = false): ?Participant`
Resolves the participant row for a given app model inside this conversation.

```php
$participant = $conversation->participant(auth()->user());
```

#### `addParticipant(Model $user, ParticipantRole $role = ParticipantRole::PARTICIPANT, bool $undoAdminRemovalAction = false): Participant`
Adds a participant while enforcing Wirechat's private, self, and admin-removal rules.

```php
$conversation->addParticipant($user);
```

#### `peerParticipant(Model|Authenticatable $reference): ?Participant`
Returns the other participant in a private conversation. In a self conversation, it resolves the same participant row for the reference model.

```php
$peer = $conversation->peerParticipant(auth()->user());
```

#### `peerParticipants(Model $reference): Collection`
Returns every participant except the given reference model. This is useful for group notifications and participant lists.

```php
$others = $conversation->peerParticipants(auth()->user());
```

#### `markAsRead(?Model $user = null): void`
Updates `conversation_read_at` for the given user, or the authenticated user when no model is passed.

```php
$conversation->markAsRead();
```

#### `readBy(Model|Participant $user): bool`
Checks whether the conversation is fully read for a participant.

```php
if ($conversation->readBy(auth()->user())) {
    // Conversation is fully read for this user.
}
```

#### `getUnreadCountFor(Model $model): int`
Counts unread messages for a given participantable model.

```php
$count = $conversation->getUnreadCountFor(auth()->user());
```

#### `hasDisappearingTurnedOn(): bool`
Returns `true` when disappearing mode is active and properly configured.

```php
if ($conversation->hasDisappearingTurnedOn()) {
    // Show disappearing-message UI.
}
```

#### `turnOnDisappearing(int $durationInSeconds): void`
Enables disappearing messages for the conversation. The package currently requires at least one hour.

```php
$conversation->turnOnDisappearing(86400);
```

#### `turnOffDisappearing(): void`
Disables disappearing messages for the conversation.

```php
$conversation->turnOffDisappearing();
```

#### `deleteFor(Model|Authenticatable $user): ?bool`
Deletes the conversation for one participant. Depending on conversation type and other members' state, Wirechat may fully delete the conversation record as well.

```php
$conversation->deleteFor(auth()->user());
```

#### `hasBeenDeletedBy(Model|Authenticatable $user): bool`
Checks whether delete-for-user is still active for the given participant.

```php
$conversation->hasBeenDeletedBy(auth()->user());
```

#### `clearFor(Model|Authenticatable $user): void`
Clears the conversation history for one participant without fully deleting the thread.

```php
$conversation->clearFor(auth()->user());
```

#### `isPrivate(): bool`
Returns `true` when the conversation type is private.

```php
if ($conversation->isPrivate()) {
    // Private thread logic.
}
```

#### `isSelf(): bool`
Returns `true` when the conversation is a self chat.

```php
if ($conversation->isSelf()) {
    // Notes-to-self style behavior.
}
```

#### `isGroup(): bool`
Returns `true` when the conversation is a group thread.

```php
if ($conversation->isGroup()) {
    // Group-specific UI or permissions.
}
```

#### `isOwner(Model|Authenticatable $model): bool`
Checks whether the given participantable model is the conversation owner.

```php
$conversation->isOwner(auth()->user());
```

#### `isAdmin(Model|Authenticatable $model): bool`
Checks whether the given participantable model is owner or admin.

```php
$conversation->isAdmin(auth()->user());
```

### Important query helpers

#### `whereParticipantable(Model $participantable)`
Filters conversations that contain a specific model as participant.

```php
$conversations = Conversation::query()
    ->whereParticipantable(auth()->user())
    ->get();
```

#### `whereHasParticipant($userId, $userType)`
Filters conversations by raw participantable id and morph type.

```php
$conversations = Conversation::query()
    ->whereHasParticipant($user->getKey(), $user->getMorphClass())
    ->get();
```

#### `withoutBlanks()`
Hides conversations with no visible messages for the authenticated user.

```php
$conversations = Conversation::query()
    ->withoutBlanks()
    ->get();
```

#### `withoutCleared()`
Hides conversations cleared by the authenticated participant until new activity happens.

```php
$conversations = Conversation::query()
    ->withoutCleared()
    ->get();
```

#### `withoutDeleted()`
Hides conversations deleted by the authenticated participant until new activity happens.

```php
$conversations = Conversation::query()
    ->withoutDeleted()
    ->get();
```

#### `withDeleted()`
Includes conversations even if the authenticated participant has deleted them.

```php
$conversations = Conversation::query()
    ->withDeleted()
    ->get();
```

Legacy helpers `receiverParticipant()` and `authParticipant()` still exist, but new code should prefer `peerParticipant()` and `participant()`.

Typical safe customizations:

- Add app-specific relations such as tickets, orders, or inbox metadata.
- Add accessors for labels or badges.
- Add custom scopes for conversation lists.
- Keep `participants()` and `messages()` intact because most of Wirechat depends on them.

---

<x-section-heading label="Participant" />

`Participant` is the membership pivot model between a conversation and one of your application's models.
This is the model that makes Wirechat polymorphic.

This is one of the most important models to keep compatible because message visibility, role checks, and delete/clear behavior all depend on it.

Core fields:

| Field | Purpose |
| --- | --- |
| `conversation_id` | The thread this membership belongs to. |
| `participantable_id` | The underlying app model id. |
| `participantable_type` | The morph class for the underlying app model. |
| `role` | Participant role enum, including owner and admin. |
| `exited_at` | Timestamp used to mark members who left a conversation. |
| `last_active_at` | Participant activity timestamp. |
| `conversation_read_at` | Last read marker for unread logic. |
| `conversation_cleared_at` | Last clear-history marker. |
| `conversation_deleted_at` | Last delete-for-user marker. |

### Important relationships

#### `participantable(): MorphTo`
Returns the real app model behind the participant row.

```php
$user = $participant->participantable;
```

#### `conversation(): BelongsTo`
Returns the parent conversation for this participant.

```php
$conversation = $participant->conversation;
```

#### `messages(): HasMany`
Returns messages sent by this participant.

```php
$messages = $participant->messages()->latest()->get();
```

#### `performedActions(): MorphMany`
Returns actions performed by this participant as an actor.

```php
$actions = $participant->performedActions()->latest()->get();
```

### Important helpers

#### `isAdmin(): bool`
Returns `true` when the participant role is owner or admin.

```php
if ($participant->isAdmin()) {
    // Elevated participant permissions.
}
```

#### `isOwner(): bool`
Returns `true` when the participant is the owner.

```php
if ($participant->isOwner()) {
    // Owner-only flow.
}
```

#### `exitConversation(): bool`
Marks the participant as exited while enforcing package rules such as blocking owners from leaving their own group.

```php
$participant->exitConversation();
```

#### `hasExited(): bool`
Checks whether the participant has already left the conversation.

```php
$participant->hasExited();
```

#### `isRemovedByAdmin(): bool`
Checks whether an admin-removal action exists for this participant.

```php
if ($participant->isRemovedByAdmin()) {
    // Member was removed by an admin or owner.
}
```

#### `removeByAdmin(Model|Authenticatable $admin): void`
Records the admin-removal action using the admin's participant row as the actor, then downgrades the removed member's role back to `participant`.

```php
$participant->removeByAdmin(auth()->user());
```

#### `hasDeletedConversation(bool $checkDeletionExpired = false): bool`
Checks whether the participant has deleted the conversation, with an optional freshness check against the conversation's latest update timestamp.

```php
$participant->hasDeletedConversation(true);
```

### Important query helpers

#### `whereParticipantable(Model|Authenticatable $model)`
Filters participant rows for a specific app model.

```php
$participant = Participant::query()
    ->whereParticipantable(auth()->user())
    ->first();
```

#### `withExited()`
Includes participants hidden by the default exited scope.

```php
$participants = Participant::query()
    ->withExited()
    ->get();
```

#### `withoutParticipantable(Model|Authenticatable $user)`
Excludes a specific participantable model from the query.

```php
$others = $conversation->participants()
    ->withoutParticipantable(auth()->user())
    ->get();
```

Typical safe customizations:

- Add participant-level profile helpers.
- Add app-specific membership metadata.
- Add convenience methods that build on role and visibility state.
- Preserve the default global scopes unless you are intentionally replacing the membership rules.

---

<x-section-heading label="Message" />

`Message` represents an individual chat item inside a conversation.

Wirechat now treats `participant_id` as the source of truth for ownership and sender identity, so this model should stay aligned with the participant layer.

Core fields:

| Field | Purpose |
| --- | --- |
| `conversation_id` | Parent conversation id. |
| `participant_id` | Sender participant id. |
| `reply_id` | Parent message reference for threaded replies. |
| `body` | Message text or link content. |
| `type` | Message type enum such as text, link, or attachment. |
| `kept_at` | Timestamp used to preserve a disappearing message. |
| `deleted_at` | Soft-delete timestamp for delete-for-everyone flows. |

### Important relationships

#### `conversation(): BelongsTo`
Returns the parent conversation for the message.

```php
$conversation = $message->conversation;
```

#### `participant(): BelongsTo`
Returns the sender participant row.

```php
$participant = $message->participant;
```

#### `attachment(): MorphOne`
Returns the attachment model when the message is an attachment message.

```php
$attachment = $message->attachment;
```

#### `parent(): BelongsTo`
Returns the message that this message replies to.

```php
$parent = $message->parent;
```

#### `reply(): HasOne`
Returns a reply to this message when one exists.

```php
$reply = $message->reply;
```

### Important accessors and helpers

#### `$message->user`
Returns the underlying app model behind the sender participant.

```php
$sender = $message->user;
```

#### `$message->resolved_link`
Normalizes naked links into full URLs when the message type is `link`.

```php
$url = $message->resolved_link;
```

#### `hasAttachment(): bool`
Checks whether the message currently has an attachment record.

```php
if ($message->hasAttachment()) {
    // Render file preview.
}
```

#### `isAttachment(): bool`
Checks whether the message type is attachment.

```php
$message->isAttachment();
```

#### `isLink(): bool`
Checks whether the message type is link.

```php
$message->isLink();
```

#### `readBy(Model|Participant $user): bool`
Checks whether the message is effectively read for a given participant or app model.

```php
$message->readBy(auth()->user());
```

#### `ownedBy(Model $user): bool`
Checks whether the given app model owns the message.

```php
if ($message->ownedBy(auth()->user())) {
    // Show owner actions.
}
```

#### `belongsToAuth(): bool`
Checks whether the authenticated user owns the message.

```php
$message->belongsToAuth();
```

#### `hasReply(): bool`
Checks whether this message already has a reply.

```php
$message->hasReply();
```

#### `hasParent(): bool`
Checks whether this message is itself a reply.

```php
$message->hasParent();
```

#### `deleteFor(Model|Authenticatable $user): ?bool`
Deletes the message only for one participant, and may fully delete the message once package rules are satisfied.

```php
$message->deleteFor(auth()->user());
```

#### `deleteForEveryone(Model $user): void`
Deletes the message globally when the actor owns it, or when a group admin is allowed to do it.

```php
$message->deleteForEveryone(auth()->user());
```

#### `isEmoji(): bool`
Checks whether the message body contains only emoji characters.

```php
$message->isEmoji();
```

### Important query helpers

#### `whereIsNotOwnedBy(Model|Authenticatable $user)`
Filters out messages owned by the given participantable model.

```php
$messages = $conversation->messages()
    ->whereIsNotOwnedBy(auth()->user())
    ->get();
```

New code should prefer `$message->user` over the legacy `$message->sendable` accessor.

---

<x-section-heading label="Group" />

`Group` stores the metadata for group conversations.
The actual thread still lives in `Conversation`; `Group` adds group-specific information on top of it.

This model is a good place to add app-specific room metadata, as long as you keep the package permission flags intact.

Core fields:

| Field | Purpose |
| --- | --- |
| `conversation_id` | Parent conversation id for the group thread. |
| `name` | Group name. |
| `description` | Group description or about text. |
| `type` | Group type enum. |
| `allow_members_to_send_messages` | Permission flag for regular members. |
| `allow_members_to_add_others` | Permission flag for inviting others. |
| `allow_members_to_edit_group_info` | Permission flag for editing name and description. |
| `admins_must_approve_new_members` | Approval flag used during join flows. |

### Important relationships

#### `conversation(): BelongsTo`
Returns the parent conversation for the group.

```php
$conversation = $group->conversation;
```

#### `cover(): MorphOne`
Returns the cover attachment model when the group has one.

```php
$cover = $group->cover;
```

### Important accessors and helpers

#### `$group->cover_url`
Returns the resolved URL for the cover attachment when it exists.

```php
$url = $group->cover_url;
```

#### `isOwnedBy(Model|Authenticatable $user): bool`
Checks whether the given app model is the owner of the group conversation.

```php
$group->isOwnedBy(auth()->user());
```

#### `allowsMembersToSendMessages(): bool`
Checks whether regular members are allowed to send messages in this group.

```php
if ($group->allowsMembersToSendMessages()) {
    // Members can chat without admin-only restrictions.
}
```

#### `allowsMembersToAddOthers(): bool`
Checks whether regular members are allowed to invite other users.

```php
$group->allowsMembersToAddOthers();
```

#### `allowsMembersToEditGroupInfo(): bool`
Checks whether regular members can update the group name or description.

```php
$group->allowsMembersToEditGroupInfo();
```

#### `$group->admins_must_approve_new_members`
This is a stored flag rather than a dedicated helper method. Use it when building join-request or approval flows.

```php
if ($group->admins_must_approve_new_members) {
    // Route new members through approval.
}
```

Typical safe customizations:

- Add organization or workspace relations.
- Add visual metadata such as themes, tags, or external ids.
- Add read-only accessors for display data.
- Preserve the permission flags and cover-cleanup behavior.

---

<x-section-heading label="Attachment" />

`Attachment` stores uploaded file metadata for attachable records.
In practice, this is commonly used for message attachments and group covers.

This model is tightly coupled to storage config, URL generation, and file cleanup.

Core fields:

| Field | Purpose |
| --- | --- |
| `attachable_id` | Parent model id. |
| `attachable_type` | Parent model morph class. |
| `file_path` | Storage path on the configured disk. |
| `file_name` | Stored file name. |
| `original_name` | Original uploaded file name. |
| `mime_type` | Stored MIME type. |
| `url` | Computed URL accessor based on storage config. |

### Important relationships

#### `attachable(): MorphTo`
Returns the model this attachment belongs to, usually a `Message` or `Group`.

```php
$parent = $attachment->attachable;
```

### Important accessors

#### `$attachment->url`
Returns a public URL or a temporary private URL depending on the global Wirechat storage configuration.

```php
$url = $attachment->url;
```

#### `$attachment->size`
Returns file size in bytes if the file still exists on the configured disk.

```php
$bytes = $attachment->size;
```

#### `$attachment->formatted_size`
Returns a human-readable file size.

```php
$label = $attachment->formatted_size;
```

#### `$attachment->extension`
Returns an extension-like value derived from the MIME type.

```php
$attachment->extension;
```

#### `$attachment->clean_mime_type`
Returns the MIME subtype, such as `png`, `pdf`, or `zip`.

```php
$attachment->clean_mime_type;
```

If you customize this model, preserve the filesystem cleanup behavior unless you are intentionally replacing it with your own storage lifecycle.

---

<x-section-heading label="Action" />

`Action` is Wirechat's audit-style polymorphic action model.
It is used for package-level state changes such as deletions and admin removals.

Core fields:

| Field | Purpose |
| --- | --- |
| `actionable_id` | Target model id. |
| `actionable_type` | Target model morph class. |
| `actor_id` | Actor model id. |
| `actor_type` | Actor model morph class. |
| `type` | Action enum such as delete or removed-by-admin. |
| `data` | Optional extra payload for the action. |

### Important relationships

#### `actionable(): MorphTo`
Returns the model the action was performed on.

```php
$target = $action->actionable;
```

#### `actor(): MorphTo`
Returns the model that performed the action. In package flows this is often a `Participant`.

```php
$actor = $action->actor;
```

### Important query helpers

#### `whereActor(Model $actor)`
Filters actions created by a specific actor.

```php
$actions = Action::query()
    ->whereActor($participant)
    ->get();
```

#### `withoutActor(Model $model)`
Excludes actions created by a specific actor.

```php
$actions = Action::query()
    ->withoutActor($participant)
    ->get();
```

Common package uses:

- Message delete-for-user actions.
- Participant removed-by-admin actions.
- Other audit-style state changes attached to conversations, messages, or participants.

If you add custom action types in your app, extending this model is a clean place to centralize action formatting or app-specific helpers.

---

<x-section-heading label="Security And Consistency" />

The goal of configurable models is to give your team flexibility without forcing a fork of the package.
Wirechat still protects the integration by requiring each configured model to extend the matching base model.

That gives you a strong default contract:

- Package queries, jobs, scopes, and relationships continue to work.
- Core authorization and visibility logic stays in place unless you intentionally override it.
- Your team can focus on domain-specific behavior instead of rebuilding the package internals.

If your developers only need custom labels, extra relations, metadata, or app-specific helper methods, subclassing the default models is the safest path.
</x-markdown>

<x-slot name="subNavigation">
    <x-sub-navigation :items="[
        'Models',
        'How Model Resolution Works',
        'Conversation',
        'Participant',
        'Message',
        'Group',
        'Attachment',
        'Action',
        'Security And Consistency',
    ]"/>
</x-slot>

</x-docs-layout>

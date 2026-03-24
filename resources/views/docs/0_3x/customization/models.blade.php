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
This matters because the package depends on inherited relationships, casts, scopes, cleanup hooks, and helper methods.

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
- Add non-breaking casts or guarded or fillable adjustments that still respect the package schema.

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

This record coordinates participants, messages, disappearing-message state, and conversation-level visibility rules.

Core fields:

| Field | Purpose |
| --- | --- |
| `id` | Primary key for the thread. |
| `type` | Conversation type enum: private, self, or group. |
| `disappearing_started_at` | When disappearing mode was enabled. |
| `disappearing_duration` | Disappearing duration in seconds. |
| `created_at` | Thread creation timestamp. |
| `updated_at` | Latest activity timestamp used by unread and delete or clear logic. |

<x-sub-section-heading label="Important Relationships" key="Conversation Relationships" />


**`participants(): HasMany`**

Returns the membership rows for everyone in the conversation.<br>

  ```php
  $conversation->participants()->with('participantable')->get()
  ```

  **`messages(): HasMany`**

Returns the messages that belong to the conversation.<br>

  ```php
  $conversation->messages()->latest()->get()
  ```

  **`lastMessage(): HasOne`**

Returns the latest message for previews and list ordering.<br>

  ```php
  $conversation->lastMessage
  ```

  **`group(): HasOne`**

Returns the group metadata row when the conversation is a group thread.<br>

  ```php
  $conversation->group
  ```

  **`attachments(): Builder`**

Builds an attachment query for all message attachments in the conversation.<br>

  ```php
  $conversation->attachments()->latest()->get()
  ```

  **`actions(): MorphMany`**

Returns actions recorded directly against the conversation model.<br>

  ```php
  $conversation->actions()->latest()->get()
  ```

<x-sub-section-heading label="Important Helpers" key="Conversation Helpers" />


**`participant(Model|Authenticatable $user, bool $withoutGlobalScopes = false): ?Participant`**

Resolves the participant row for a given app model.<br>

  ```php
  $conversation->participant(auth()->user())
  ```

  **`addParticipant(Model $user, ParticipantRole $role = ParticipantRole::PARTICIPANT, bool $undoAdminRemovalAction = false): Participant`**

Adds a participant while enforcing private, self, and admin-removal rules.<br>

  ```php
  $conversation->addParticipant($user)
  ```

  **`peerParticipant(Model|Authenticatable $reference): ?Participant`**

Resolves the other participant in a private conversation.<br>

  ```php
  $conversation->peerParticipant(auth()->user())
  ```

  **`peerParticipants(Model $reference): Collection`**

Returns every participant except the given reference model.<br>

  ```php
  $conversation->peerParticipants(auth()->user())
  ```

  **`getReceiver()`**

Resolves the other side of a private conversation for UI usage. This helper depends on an authenticated user being available internally, so it is best used inside auth-aware UI flows. When you already have the current user model, prefer `peerParticipant()` because it accepts the current user explicitly.<br>

  ```php
  $peerParticipant = $conversation->peerParticipant(auth()->user())
  ```

  **`markAsRead(?Model $user = null): void`**

Updates `conversation_read_at` for the given user or the authenticated user.<br>

  ```php
  $conversation->markAsRead()
  ```

  **`readBy(Model|Participant $user): bool`**

Checks whether the conversation is fully read for a participant.<br>

  ```php
  $conversation->readBy(auth()->user())
  ```

  **`getUnreadCountFor(Model $model): int`**

Counts unread messages for a given participantable model.<br>

  ```php
  $conversation->getUnreadCountFor(auth()->user())
  ```

  **`hasDisappearingTurnedOn(): bool`**

Returns `true` when disappearing mode is active.<br>

  ```php
  $conversation->hasDisappearingTurnedOn()
  ```

  **`turnOnDisappearing(int $durationInSeconds): void`**

Enables disappearing messages and currently requires at least one hour.<br>

  ```php
  $conversation->turnOnDisappearing(86400)
  ```

  **`turnOffDisappearing(): void`**

Disables disappearing messages.<br>

  ```php
  $conversation->turnOffDisappearing()
  ```

  **`deleteFor(Model|Authenticatable $user): ?bool`**

Deletes the conversation for one participant and may fully delete the record when package rules allow.<br>

  ```php
  $conversation->deleteFor(auth()->user())
  ```

  **`hasBeenDeletedBy(Model|Authenticatable $user): bool`**

Checks whether delete-for-user is still active for a participant.<br>

  ```php
  $conversation->hasBeenDeletedBy(auth()->user())
  ```

  **`clearFor(Model|Authenticatable $user): void`**

Clears conversation history for one participant without fully deleting the thread.<br>

  ```php
  $conversation->clearFor(auth()->user())
  ```

  **`isPrivate(): bool`**

Returns `true` when the conversation is a private conversation between two different users.<br>

  ```php
  $conversation->isPrivate()
  ```

  **`isSelf(): bool`**

Returns `true` when the conversation is a self conversation for a single user.<br>

  ```php
  $conversation->isSelf()
  ```

  **`isGroup(): bool`**

Returns `true` when the conversation is a group conversation.<br>

  ```php
  $conversation->isGroup()
  ```

  **`isOwner(Model|Authenticatable $model): bool`**

Checks whether the given user is the owner of the conversation. In group conversations this is the group owner. In private conversations both participants are effectively owners, so this can return `true` for either side.<br>

  ```php
  $conversation->isOwner(auth()->user())
  ```

  **`isAdmin(Model|Authenticatable $model): bool`**

Checks whether the given user has admin-level access in the conversation. In groups this returns `true` for admins and for the owner, because the owner is also treated as an admin.<br>

  ```php
  $conversation->isAdmin(auth()->user())
  ```

<x-sub-section-heading label="Important Query Helpers" key="Conversation Query Helpers" />


**`whereParticipantable(Model $participantable)`**

Filters conversations that contain a specific model as participant.<br>

  ```php
  Conversation::query()->whereParticipantable(auth()->user())->get()
  ```

  **`whereHasParticipant($userId, $userType)`**

Filters conversations by raw participantable id and morph type.<br>

  ```php
  Conversation::query()->whereHasParticipant($user->getKey(), $user->getMorphClass())->get()
  ```

  **`withoutBlanks()`**

Hides conversations with no visible messages for the authenticated user.<br>

  ```php
  Conversation::query()->withoutBlanks()->get()
  ```

  **`withoutCleared()`**

Hides conversations cleared by the authenticated participant until new activity appears.<br>

  ```php
  Conversation::query()->withoutCleared()->get()
  ```

  **`withoutDeleted()`**

Hides conversations deleted by the authenticated participant until new activity appears.<br>

  ```php
  Conversation::query()->withoutDeleted()->get()
  ```

  **`withDeleted()`**

Includes conversations even if the authenticated participant has deleted them.<br>

  ```php
  Conversation::query()->withDeleted()->get()
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

It is one of the most important models to keep compatible because message visibility, role checks, and delete or clear behavior all depend on it.

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

<x-sub-section-heading label="Important Relationships" key="Participant Relationships" />


**`participantable(): MorphTo`**

Returns the real app model behind the participant row.<br>

  ```php
  $participant->participantable
  ```

  **`conversation(): BelongsTo`**

Returns the parent conversation.<br>

  ```php
  $participant->conversation
  ```

  **`messages(): HasMany`**

Returns messages sent by this participant.<br>

  ```php
  $participant->messages()->latest()->get()
  ```

  **`latestMessage(): HasOne`**

Resolves the most recent message sent by this participant.<br>

  ```php
  $participant->latestMessage
  ```

  **`actions(): MorphMany`**

Returns actions recorded against this participant row.<br>

  ```php
  $participant->actions()->latest()->get()
  ```

  **`performedActions(): MorphMany`**

Returns actions this participant performed as an actor.<br>

  ```php
  $participant->performedActions()->latest()->get()
  ```

<x-sub-section-heading label="Important Helpers" key="Participant Helpers" />


**`isAdmin(): bool`**

Returns `true` when the participant is an admin or the owner. The owner is also treated as an admin by Wirechat.<br>

  ```php
  $participant->isAdmin()
  ```

  **`isOwner(): bool`**

Returns `true` only when this participant is the conversation owner.<br>

  ```php
  $participant->isOwner()
  ```

  **`exitConversation(): bool`**

Marks the participant as exited while enforcing package rules such as blocking owners from leaving their own group.<br>

  ```php
  $participant->exitConversation()
  ```

  **`hasExited(): bool`**

Checks whether the participant already left the conversation.<br>

  ```php
  $participant->hasExited()
  ```

  **`isRemovedByAdmin(): bool`**

Checks whether an admin-removal action exists for this participant.<br>

  ```php
  $participant->isRemovedByAdmin()
  ```

  **`removeByAdmin(Model|Authenticatable $admin): void`**

Records the admin-removal action using the admin's participant row as the actor, then downgrades the removed member's role.<br>

  ```php
  $participant->removeByAdmin(auth()->user())
  ```

  **`hasDeletedConversation(bool $checkDeletionExpired = false): bool`**

Checks whether delete-for-user is active, optionally comparing it against the conversation's latest update timestamp.<br>

  ```php
  $participant->hasDeletedConversation(true)
  ```

<x-sub-section-heading label="Important Query Helpers" key="Participant Query Helpers" />


**`whereParticipantable(Model|Authenticatable $model)`**

Filters participant rows for a specific app model.<br>

  ```php
  Participant::query()->whereParticipantable(auth()->user())->first()
  ```

  **`withExited()`**

Includes participants hidden by the default exited scope.<br>

  ```php
  Participant::query()->withExited()->get()
  ```

  **`withoutParticipantable(Model|Authenticatable $user)`**

Excludes a specific participantable model from the query.<br>

  ```php
  $conversation->participants()->withoutParticipantable(auth()->user())->get()
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

<x-sub-section-heading label="Important Relationships" key="Message Relationships" />


**`conversation(): BelongsTo`**

Returns the parent conversation.<br>

  ```php
  $message->conversation
  ```

  **`participant(): BelongsTo`**

Returns the sender participant row.<br>

  ```php
  $message->participant
  ```

  **`attachment(): MorphOne`**

Returns the attachment model when the message is an attachment message.<br>

  ```php
  $message->attachment
  ```

  **`parent(): BelongsTo`**

Returns the message this message replies to.<br>

  ```php
  $message->parent
  ```

  **`reply(): HasOne`**

Returns a reply to this message when one exists.<br>

  ```php
  $message->reply
  ```

  **`actions(): MorphMany`**

Returns actions recorded against the message, including delete-for-user actions.<br>

  ```php
  $message->actions()->latest()->get()
  ```

<x-sub-section-heading label="Important Accessors And Helpers" key="Message Helpers" />


**`$message->user`**

Returns the underlying app model behind the sender participant.<br>

  ```php
  $sender = $message->user
  ```

  **`$message->sendable`**

Legacy accessor alias for `$message->user`. New code should prefer `$message->user`.<br>

  ```php
  $message->sendable
  ```

  **`$message->sendable_id`**

Legacy accessor for the underlying participantable id. New code should usually work through `$message->participant` or `$message->user` instead.<br>

  ```php
  $message->sendable_id
  ```

  **`$message->sendable_type`**

Legacy accessor for the underlying participantable morph type. New code should usually work through `$message->participant` or `$message->user` instead.<br>

  ```php
  $message->sendable_type
  ```

  **`$message->resolved_link`**

Normalizes naked links into full URLs when the message type is `link`.<br>

  ```php
  $url = $message->resolved_link
  ```

  **`hasAttachment(): bool`**

Checks whether the message currently has an attachment record.<br>

  ```php
  $message->hasAttachment()
  ```

  **`isAttachment(): bool`**

Checks whether the message type is `attachment`.<br>

  ```php
  $message->isAttachment()
  ```

  **`isLink(): bool`**

Checks whether the message type is `link`.<br>

  ```php
  $message->isLink()
  ```

  **`readBy(Model|Participant $user): bool`**

Checks whether the message is effectively read for a participant or app model.<br>

  ```php
  $message->readBy(auth()->user())
  ```

  **`ownedBy(Model $user): bool`**

Checks whether the given user owns the message by comparing against the sender participant.<br>

  ```php
  $message->ownedBy(auth()->user())
  ```

  **`belongsToAuth(): bool`**

Checks whether the currently authenticated user owns the message.<br>

  ```php
  $message->belongsToAuth()
  ```

  **`hasReply(): bool`**

Checks whether this message already has a reply.<br>

  ```php
  $message->hasReply()
  ```

  **`hasParent(): bool`**

Checks whether this message is itself a reply to another message.<br>

  ```php
  $message->hasParent()
  ```

  **`deleteFor(Model|Authenticatable $user): ?bool`**

Deletes the message only for one participant and may fully delete it once package rules are satisfied.<br>

  ```php
  $message->deleteFor(auth()->user())
  ```

  **`deleteForEveryone(Model $user): void`**

Deletes the message globally when the actor owns it or when a group admin is allowed to do it.<br>

  ```php
  $message->deleteForEveryone(auth()->user())
  ```

  **`isEmoji(): bool`**

Checks whether the message body contains only emoji characters.<br>

  ```php
  $message->isEmoji()
  ```

<x-sub-section-heading label="Important Query Helpers" key="Message Query Helpers" />


**`whereIsNotOwnedBy(Model|Authenticatable $user)`**

Filters out messages owned by the given participantable model.<br>

  ```php
  $conversation->messages()->whereIsNotOwnedBy(auth()->user())->get()
  ```

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

<x-sub-section-heading label="Important Relationships" key="Group Relationships" />


**`conversation(): BelongsTo`**

Returns the parent conversation.<br>

  ```php
  $group->conversation
  ```

  **`cover(): MorphOne`**

Returns the cover attachment model when the group has one.<br>

  ```php
  $group->cover
  ```

<x-sub-section-heading label="Important Accessors And Helpers" key="Group Helpers" />


**`$group->cover_url`**

Returns the resolved URL for the cover attachment when it exists.<br>

  ```php
  $group->cover_url
  ```

  **`isOwnedBy(Model|Authenticatable $user): bool`**

Checks whether the given app model is the owner of the group conversation.<br>

  ```php
  $group->isOwnedBy(auth()->user())
  ```

  **`allowsMembersToSendMessages(): bool`**

Checks whether regular members are allowed to send messages in the group.<br>

  ```php
  $group->allowsMembersToSendMessages()
  ```

  **`allowsMembersToAddOthers(): bool`**

Checks whether regular members are allowed to invite other users.<br>

  ```php
  $group->allowsMembersToAddOthers()
  ```

  **`allowsMembersToEditGroupInfo(): bool`**

Checks whether regular members can update the group name or description.<br>

  ```php
  $group->allowsMembersToEditGroupInfo()
  ```

  **`$group->admins_must_approve_new_members`**

This is a stored flag rather than a helper method and is useful when building join-request or approval flows.<br>

  ```php
  $group->admins_must_approve_new_members
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

<x-sub-section-heading label="Important Relationships" key="Attachment Relationships" />


**`attachable(): MorphTo`**

Returns the model this attachment belongs to, usually a `Message` or `Group`.<br>

  ```php
  $attachment->attachable
  ```

<x-sub-section-heading label="Important Accessors" key="Attachment Accessors" />


**`$attachment->url`**

Returns a public URL or a temporary private URL depending on the global Wirechat storage configuration.<br>

  ```php
  $attachment->url
  ```

  **`$attachment->size`**

Returns the file size in bytes when the file exists on disk.<br>

  ```php
  $attachment->size
  ```

  **`$attachment->formatted_size`**

Returns the file size in a human-readable format.<br>

  ```php
  $attachment->formatted_size
  ```

  **`$attachment->extension`**

Returns an extension-like value derived from the MIME type.<br>

  ```php
  $attachment->extension
  ```

  **`$attachment->clean_mime_type`**

Returns the MIME subtype, such as `png`, `pdf`, or `zip`.<br>

  ```php
  $attachment->clean_mime_type
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

<x-sub-section-heading label="Important Relationships" key="Action Relationships" />


**`actionable(): MorphTo`**

Returns the model the action was performed on.<br>

  ```php
  $action->actionable
  ```

  **`actor(): MorphTo`**

Returns the model that performed the action. In package flows this is often a `Participant`.<br>

  ```php
  $action->actor
  ```

<x-sub-section-heading label="Important Query Helpers" key="Action Query Helpers" />


**`whereActor(Model $actor)`**

Filters actions created by a specific actor.<br>

  ```php
  Action::query()->whereActor($participant)->get()
  ```

  **`withoutActor(Model $model)`**

Excludes actions created by a specific actor.<br>

  ```php
  Action::query()->withoutActor($participant)->get()
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
        'How Model Resolution Works',
        'Conversation' => [
            'Important Relationships' => 'Conversation Relationships',
            'Important Helpers' => 'Conversation Helpers',
            'Important Query Helpers' => 'Conversation Query Helpers',
        ],
        'Participant' => [
            'Important Relationships' => 'Participant Relationships',
            'Important Helpers' => 'Participant Helpers',
            'Important Query Helpers' => 'Participant Query Helpers',
        ],
        'Message' => [
            'Important Relationships' => 'Message Relationships',
            'Important Accessors And Helpers' => 'Message Helpers',
            'Important Query Helpers' => 'Message Query Helpers',
        ],
        'Group' => [
            'Important Relationships' => 'Group Relationships',
            'Important Accessors And Helpers' => 'Group Helpers',
        ],
        'Attachment' => [
            'Important Relationships' => 'Attachment Relationships',
            'Important Accessors' => 'Attachment Accessors',
        ],
        'Action' => [
            'Important Relationships' => 'Action Relationships',
            'Important Query Helpers' => 'Action Query Helpers',
        ],
        'Security And Consistency',
    ]"/>
</x-slot>

</x-docs-layout>

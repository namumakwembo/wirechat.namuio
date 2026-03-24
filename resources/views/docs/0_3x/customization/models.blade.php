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

Important relationships:

| Relationship | Returns | Purpose |
| --- | --- | --- |
| `participants()` | `HasMany<Participant>` | Membership rows for everyone in the conversation. |
| `messages()` | `HasMany<Message>` | Messages inside the thread. |
| `lastMessage()` | `HasOne<Message>` | Latest message for previews and ordering. |
| `group()` | `HasOne<Group>` | Group metadata for group conversations. |
| `attachments()` | `Builder<Attachment>` | Attachment records belonging to messages in this conversation. |
| `actions()` | `MorphMany<Action>` | Actions performed on the conversation itself. |

Important helpers:

| Method | Params | Purpose |
| --- | --- | --- |
| `participant()` | `user, withoutGlobalScopes = false` | Resolve the participant row for a given app model. |
| `addParticipant()` | `user, role = participant, undoAdminRemovalAction = false` | Add a participant while enforcing private/self limits and admin-removal rules. |
| `peerParticipant()` | `reference` | Get the other participant in a private chat, or the same participant in a self chat. |
| `peerParticipants()` | `reference` | Get every participant except the given model. |
| `getReceiver()` | `None` | Resolve the other side of a private chat for UI usage. |
| `markAsRead()` | `user = auth user` | Update `conversation_read_at` for a participant. |
| `readBy()` | `user or participant` | Check whether the conversation is fully read for that member. |
| `unreadMessages()` | `user` | Return unread messages not owned by that user. |
| `getUnreadCountFor()` | `model` | Count unread messages for a given app model. |
| `hasDisappearingTurnedOn()` | `None` | Boolean check for disappearing-message mode. |
| `turnOnDisappearing()` | `durationInSeconds` | Enable disappearing messages; requires at least one hour. |
| `turnOffDisappearing()` | `None` | Disable disappearing messages. |
| `deleteFor()` | `user` | Delete the conversation for one participant and fully delete it when package rules allow. |
| `hasBeenDeletedBy()` | `user` | Check whether delete-for-user is still active for that participant. |
| `clearFor()` | `user` | Clear the conversation history for one participant without fully deleting the thread. |
| `isSelfConversation()` | `None` | Alias for `isSelf()`. |
| `isPrivate()` | `None` | Boolean check for private conversations. |
| `isSelf()` | `None` | Boolean check for self conversations. |
| `isGroup()` | `None` | Boolean check for group conversations. |
| `isOwner()` | `model` | Check whether the given participant is the owner. |
| `isAdmin()` | `model` | Check whether the given participant is owner or admin. |

Important query helpers:

| Query helper | Params | Purpose |
| --- | --- | --- |
| `->whereParticipantable()` | `participantable model` | Filter conversations that contain a given model as participant. |
| `->whereHasParticipant()` | `userId, userType` | Filter by raw participant id and morph type. |
| `->withoutBlanks()` | `None` | Hide conversations that have no visible messages for the authenticated user. |
| `->withoutCleared()` | `None` | Hide conversations cleared by the authenticated participant until new activity appears. |
| `->withoutDeleted()` | `None` | Hide conversations deleted by the authenticated participant until new activity appears. |
| `->withDeleted()` | `None` | Include conversations even if the authenticated participant has deleted them. |

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

Important relationships:

| Relationship | Returns | Purpose |
| --- | --- | --- |
| `participantable()` | `MorphTo` | The actual app model participating in the conversation. |
| `conversation()` | `BelongsTo<Conversation>` | Parent conversation. |
| `messages()` | `HasMany<Message>` | Messages sent by this participant. |
| `latestMessage()` | `HasOne<Message>` | Most recent message sent by this participant. |
| `actions()` | `MorphMany<Action>` | Actions performed on this participant row. |
| `performedActions()` | `MorphMany<Action>` | Actions this participant performed as an actor. |

Important helpers:

| Method | Params | Purpose |
| --- | --- | --- |
| `isAdmin()` | `None` | True when the participant is owner or admin. |
| `isOwner()` | `None` | True when the participant is the owner. |
| `exitConversation()` | `None` | Mark the participant as exited, while enforcing package rules. |
| `hasExited()` | `None` | Check whether the participant already left. |
| `isRemovedByAdmin()` | `None` | Check whether an admin-removal action exists for this member. |
| `removeByAdmin()` | `admin` | Record an admin-removal action and downgrade the role to participant. |
| `hasDeletedConversation()` | `checkDeletionExpired = false` | Check whether delete-for-user is active for this member. |

Important query helpers:

| Query helper | Params | Purpose |
| --- | --- | --- |
| `->whereParticipantable()` | `model` | Filter participants for a given app model. |
| `->withExited()` | `None` | Include participants that were hidden by the default exited scope. |
| `->withoutParticipantable()` | `user` | Exclude a specific participantable model. |

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

Important relationships:

| Relationship | Returns | Purpose |
| --- | --- | --- |
| `conversation()` | `BelongsTo<Conversation>` | Parent thread. |
| `participant()` | `BelongsTo<Participant>` | Sender participant. |
| `attachment()` | `MorphOne<Attachment>` | Uploaded file attached to the message. |
| `parent()` | `BelongsTo<Message>` | The message this one replies to. |
| `reply()` | `HasOne<Message>` | A reply sent to this message. |
| `actions()` | `MorphMany<Action>` | Actions recorded against the message, including delete-for-user. |

Important helpers and accessors:

| Method or accessor | Params | Purpose |
| --- | --- | --- |
| `$message->user` | `None` | Accessor that returns the underlying app model behind the sender participant. |
| `$message->sendable` | `None` | Legacy accessor alias for `$message->user`. |
| `$message->sendable_id` | `None` | Legacy accessor for the participantable id. |
| `$message->sendable_type` | `None` | Legacy accessor for the participantable morph class. |
| `$message->resolved_link` | `None` | Accessor that normalizes naked links to a full URL. |
| `hasAttachment()` | `None` | Check whether the message currently has an attachment. |
| `isAttachment()` | `None` | Check whether the message type is attachment. |
| `isLink()` | `None` | Check whether the message type is link. |
| `readBy()` | `user or participant` | Check whether the message is effectively read for a member. |
| `ownedBy()` | `user` | Check whether the given app model owns the message. |
| `belongsToAuth()` | `None` | Check whether the authenticated user owns the message. |
| `hasReply()` | `None` | Check whether this message has a reply. |
| `hasParent()` | `None` | Check whether this message is itself a reply. |
| `deleteFor()` | `user` | Delete the message only for one participant and fully delete when package rules allow. |
| `deleteForEveryone()` | `user` | Delete the message globally if the actor is allowed to do so. |
| `isEmoji()` | `None` | Check whether the body contains only emoji characters. |

Important query helpers:

| Query helper | Params | Purpose |
| --- | --- | --- |
| `->whereIsNotOwnedBy()` | `user` | Filter out messages owned by the given participantable model. |

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

Important relationships:

| Relationship | Returns | Purpose |
| --- | --- | --- |
| `conversation()` | `BelongsTo<Conversation>` | Parent conversation. |
| `cover()` | `MorphOne<Attachment>` | Optional group cover attachment. |

Important helpers and accessors:

| Method or accessor | Params | Purpose |
| --- | --- | --- |
| `$group->cover_url` | `None` | Accessor that returns the cover attachment URL when present. |
| `isOwnedBy()` | `user` | Check whether the given app model is the owner of the group conversation. |
| `allowsMembersToSendMessages()` | `None` | Boolean helper for `allow_members_to_send_messages`. |
| `allowsMembersToAddOthers()` | `None` | Boolean helper for `allow_members_to_add_others`. |
| `allowsMembersToEditGroupInfo()` | `None` | Boolean helper for `allow_members_to_edit_group_info`. |
| `$group->admins_must_approve_new_members` | `None` | Raw flag for approval flows; there is currently no dedicated helper method. |

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

Important relationships:

| Relationship | Returns | Purpose |
| --- | --- | --- |
| `attachable()` | `MorphTo` | The model this attachment belongs to, usually a message or group. |

Important helpers and accessors:

| Method or accessor | Params | Purpose |
| --- | --- | --- |
| `$attachment->url` | `None` | Computed URL; returns a public URL or temporary private URL depending on storage config. |
| `$attachment->size` | `None` | File size in bytes, if the stored file still exists. |
| `$attachment->formatted_size` | `None` | Human-readable version of `size`. |
| `$attachment->extension` | `None` | MIME-derived extension-like value. |
| `$attachment->clean_mime_type` | `None` | MIME subtype such as `png`, `pdf`, or `zip`. |

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

Important relationships:

| Relationship | Returns | Purpose |
| --- | --- | --- |
| `actionable()` | `MorphTo` | The model the action was performed on. |
| `actor()` | `MorphTo` | The model that performed the action. In package flows this is often a `Participant`. |

Important query helpers:

| Query helper | Params | Purpose |
| --- | --- | --- |
| `->whereActor()` | `actor` | Filter actions created by a specific actor. |
| `->withoutActor()` | `model` | Exclude actions created by a specific actor. |

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



<x-docs-layout>

<x-markdown>


# Authorization

Wirechat offers flexible integration with multiple guards and middleware configurations to secure your application’s routes and broadcasting channels. This guide will help you set up and manage these configurations in a simple and clear manner, making it accessible for users of all experience levels.

---


<x-section-heading label="Guards" />

**Guards** determine how users are authenticated for each request. Laravel supports multiple guards, which you can configure in the `config/auth.php` file.

### Default Guard Setup

Wirechat comes with a default guard defined in its configuration file. If you're using the default `web` guard, no additional setup is needed.

```php{}{5}
// config/wirechat.php

'routes' => [
    // ...
    'guards' => ['web'],
],
```

### Using Multiple Guards

If your application uses multiple guards, such as `admin` and `web`, you can configure Wirechat to recognize both. This allows users authenticated via either guard to access Wirechat routes and subscribe to private channels (e.g., when a message is created or a participant is notified).

```php{}{5}
// config/wirechat.php

'routes' => [
    // ...
    'guards' => ['web', 'admin'],
],
```

---

<x-section-heading label="Middleware" />

**Middleware** authenticates users when they subscribe to channels or access WireChat routes, such as `/chats` or any other prefix defined in the `routes.prefix` configuration.


<x-sub-section-heading label="Default Middleware Setup" />


WireChat uses the `web` and `auth` middleware by default to secure its routes:

```php{}{5-6}
// config/wirechat.php

'routes' => [
    // ...
    'middleware' => ['web', 'auth'],
    'guards' => ['web'],
],
```

> **Note:** In addition to `web` and `auth`, WireChat automatically applies the `belongsToConversation` middleware whenever conversation-specific routes are accessed. This ensures users can only view or act on conversations they’re authorized to see, adding an extra layer of security.


<x-sub-section-heading label="Multi-Guard Authentication" />

If your application requires support for multiple guards (e.g., `web` and `admin`), you should define the middleware to handle authentication for both guards. This ensures that Laravel checks authentication using any one of them:

```php{}{5-6}
// config/wirechat.php

'routes' => [
    // ...
    'middleware' => ['web', 'auth:admin,web'],
    'guards' => ['web', 'admin'],
],
```

With these configurations and WireChat’s **automatically applied** `belongsToConversation` middleware for conversation routes your chat system stays secure under a variety of authentication setups.


<x-sub-section-heading label="Using the `belongsToConversation` Middleware"/>

If you create **custom routes** or **embed WireChat components** that require a conversation parameter, you can explicitly apply `belongsToConversation` to ensure only authorized participants can access or interact with that conversation.

For example, if you define a custom route for a chat page:

```php
use Illuminate\Support\Facades\Route;

Route::get('/my-custom-chat/{conversation}', function ($conversation) {
    return view('my-chat-page', ['conversationId' => $conversation]);
})->middleware(['web', 'auth', 'belongsToConversation']);
```

Then, in your Blade view, you could load the conversation using the `chat` component:
@verbatim
    
```blade
<livewire:chat :conversation="$conversationId" />
```
@endverbatim


By applying the `belongsToConversation` middleware, you ensure that only users who are actually part of the specified conversation can access or load it within your custom routes or pages.

----

<x-section-heading label="Broadcasting Middleware Configuration" />

If you have custom `guards` or `middleware` defined for broadcasting in your `BroadcastServiceProvider`, ensure that these are also included in Wirechat's configuration. This synchronization is crucial because the settings in `BroadcastServiceProvider` take precedence over lower-level configurations. A mismatch between these configurations can lead to authentication issues when authorizing broadcast channels or accessing routes.

**Example:**

```php

// app/Providers/BroadcastServiceProvider.php

Broadcast::routes([
    'middleware' => ['web', 'auth:admin,web'],
    'guards' => ['web', 'admin']
    ]);

// config/wirechat.php
'routes' => [
    // ...
    'middleware' => ['web', 'auth:admin,web'],
    'guards' => ['web', 'admin']
],
```

**Key Points:**
- **Consistency**: Ensure that the `guards` and `middleware` defined in `BroadcastServiceProvider` match those in Wirechat's configuration.
- **Avoid Conflicts**: Inconsistent settings can cause users to be improperly authenticated, leading to access issues.

</x-markdown>


<x-slot name="subNavigation">

    <x-sub-navigation :items="['Guards',
    'Middleware'=>[
        'Default Middleware Setup',
        'Multi-Guard Authentication',
        'Using the belongsToConversation Middleware',
    ],
    'Broadcasting Middleware Configuration']"/>

</x-slot>
    

</x-docs-layout>
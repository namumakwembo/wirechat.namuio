

<x-docs-layout>

<x-markdown>


# Authorization

Wirechat offers flexible integration with multiple guards and middleware configurations to secure your application’s routes and broadcasting channels. This guide will help you set up and manage these configurations in a simple and clear manner, making it accessible for users of all experience levels.

---


<h2 x-scroll-section="{id:'guards'}" data-page-section id="guards"> <a href="#guards">#</a>  Guards</h2>

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


<h2 x-scroll-section="{id:'middleware'}"  data-page-section id="middleware"> <a href="#middleware">#</a>  Middleware</h2>

**Middleware** authenticates users when they subscribe to channels or access Wirechat routes, such as `/chats` or any other prefix defined in the `routes.prefix` configuration.

### Default Middleware Setup

Wirechat uses the `web` and `auth` middleware by default to secure its routes.

```php{}{5-6}
// config/wirechat.php

'routes' => [
    // ...
    'middleware' => ['web', 'auth'],
    'guards' => ['web'],
],
```

### Multi-Guard Authentication

If your application requires support for multiple guards (e.g., `web` and `admin`), you should define the middleware to handle authentication for both guards. This ensures that Laravel checks authentication using either guard, granting access if the user is authenticated by any one of them.

```php{}{5-6}
// config/wirechat.php

'routes' => [
    // ...
    'middleware' => ['web', 'auth:admin,web'],
    'guards' => ['web', 'admin'],
],
```

---

{{-- <h2 x-scroll-section="{id:'broadcasting-middleware-configuration'}"> <a href="#broadcasting-middleware-configuration">#</a>  Broadcasting Middleware Configuration</h2> --}}

<h2  x-scroll-section="{id:'broadcasting-middleware-configuration'}" data-page-section id="broadcasting-middleware-configuration"> <a href="#broadcasting-middleware-configuration">#</a>  Broadcasting Middleware Configuration</h2>

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

---

By following this guide, you can effectively secure your Wirechat implementation, accommodating users with different authentication levels seamlessly.

</x-markdown>


<x-slot name="subNavigation">

    <x-sub-navigation :items="['Guards','Middleware','Broadcasting Middleware Configuration']"/>

</x-slot>
    

</x-docs-layout>
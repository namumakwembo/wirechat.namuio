<x-markdown>


    # Authentication and Middleware

Wirechat provides flexibility for integrating multiple guards and middleware configurations to secure your application routes and broadcasting channels. Here's how to set up and manage these configurations effectively.

## Guards

Guards are used to define how users are authenticated for each request. Laravel supports multiple guards, which can be configured in the `config/auth.php` file.

### Using Multiple Guards with WireChat

If your application requires support for both `admin` and `user` guards, you can configure this in the Wirechat configuration like so:

```php
'routes' => [
    'prefix' => '/chats',
   -'middleware' => ['web', 'auth'],
   -'guards' => ['web'],
   +'middleware' => ['web', 'auth:admin,web'],
   +'guards' => ['web', 'admin'],
],
```

This setup allows both `admin` and `user` guards to access the routes. The `web` middleware group is essential for session management and other web functionalities. The `auth:admin,web` allows both guards to be used simultaneously for authentication middleware.

The `guards` configuration is specifically used for broadcasting authorization callbacks in Wirechat's default routes. This ensures that even if multiple guards are specified globally in the `BroadcastServiceProvider`, only the specified guards in the Wirechat configuration will be used for broadcasting.

 

### Broadcasting Middleware Configuration

Private and presence broadcast channels authenticate the current user via your application's default authentication guard. However, when using multiple guards, it is crucial to configure broadcasting to also allow other guards. The middleware configuration in the `BroadcastServiceProvider` is crucial as it overrides channel-specific guard settings. Ensure that your `BroadcastServiceProvider` includes the correct middleware to handle multiple guards:

```php
Broadcast::routes([
    'middleware' => ['web', 'auth:admin,web'],
]);
```

### Important Notes:

- **Centralized Configuration:** The middleware set in `BroadcastServiceProvider` applies globally to all broadcasting routes. This central configuration simplifies management but requires careful setup to avoid access issues.
- **Channel Guards:** While you can specify guards in channel definitions, it's redundant if your `BroadcastServiceProvider` already handles the necessary middleware.

## Best Practices

- **Consistency:** Ensure the middleware in `BroadcastServiceProvider` aligns with your application's access control requirements.
- **Customization:** Adjust the `routes` middleware in the Wirechat configuration to fit your guard setup.

By following these guidelines, you can effectively manage authentication and middleware in your Wirechat implementation, supporting multiple user types and ensuring secure access to your application's features.


</x-markdown>
<x-docs-layout>

<x-markdown>

# Setup

To prepare your models for WireChat, you need to integrate the `Chatable` trait. Because WireChat is polymorphic, you can add this trait to any model—not just the User model.

<x-section-heading label="Chatable Trait" />

To get started, add the `Chatable` trait to your model. For example, in your **User** model, include the trait like so:

```php
use Illuminate\Foundation\Auth\User as Authenticatable;
use Namu\WireChat\Traits\Chatable;

class User extends Authenticatable
{
    use Chatable;

    // ...
}
```

With the trait added, your model is now prepared to start conversations, send messages, and take advantage of all WireChat features.

---

<x-section-heading label="Chat Creation Permission" />

Next, you can customize who is allowed to create new chats by overriding the `canCreateChats()` method. This allows you to define your own logic for initiating chats. For example, you might only want users with a verified email to create new chats:

```php{}{8-11}
use Illuminate\Foundation\Auth\User as Authenticatable;
use Namu\WireChat\Traits\Chatable;

class User extends Authenticatable
{
    use Chatable;

    public function canCreateChats(): bool
    {
        return $this->hasVerifiedEmail();
    }
}
```

If `canCreateChats()` returns `false`, the user won’t be able to start new chats, though they will still receive messages and join existing conversations.

---

<x-section-heading label="Group Creation Permissions" key="" />

For even more control, you can also determine which users can create groups by overriding the `canCreateGroups()` method. This is useful if you want to restrict group creation to certain users. For example:

```php{}{9-12}
use Illuminate\Foundation\Auth\User as Authenticatable;
use Namu\WireChat\Traits\Chatable;

class User extends Authenticatable
{
    use Chatable;
    // ...

    public function canCreateGroups(): bool
    {
        return $this->hasVerifiedEmail() === true;
    }
}
```

- **Return `false`**: The user will be restricted from any group creation actions, including access to the "New Group" button and the `NewGroup` component.
- **Note**: This restriction does not prevent users from being added to groups, joining existing groups, or participating in group conversations.

---

This setup ensures that your models are fully prepared for WireChat’s features, giving you fine-grained control over chat and group creation.
</x-markdown>
    
<x-slot name="subNavigation">
    <x-sub-navigation :items="[
        'Chatable Trait',
        'Chat Creation Permission',
        'Group Creation Permissions'
    ]" />
</x-slot>

</x-docs-layout>
    
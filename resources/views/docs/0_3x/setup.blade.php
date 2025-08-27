<x-docs-layout>

<x-markdown>

# Setup

To prepare your models for WireChat, implement the **`WireChatUser` interface** and use the **`Chatable` trait**.
This setup equips your model to start conversations, send messages, and interact with WireChat features.

Example with a **User** model:

```php
use Illuminate\Foundation\Auth\User as Authenticatable;
use Namu\WireChat\Traits\Chatable;
use Namu\WireChat\Contracts\WireChatUser;

class User extends Authenticatable implements WireChatUser
{
    use Chatable;

    /**
    * Determine if the user can create new chats.
    */
    public function canCreateChats(): bool
    {
      return $this->hasVerifiedEmail();
    }

    /**
    * Determine if the user can create new groups.
    */
    public function canCreateGroups(): bool
    {
      return $this->hasVerifiedEmail();
    }
}
````

With this setup, your model is fully prepared for WireChat, including built-in chat and group creation logic.

</x-markdown>

<x-slot name="subNavigation">
<x-sub-navigation :items="[
'Setup',
]"/>
</x-slot>

</x-docs-layout>
```

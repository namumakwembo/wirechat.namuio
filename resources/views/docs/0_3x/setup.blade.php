<x-docs-layout>

<x-markdown>
# Setup

Before your application can interact with WireChat, your user model needs to be “WireChat-aware.”
This is done in two parts:

1. **Implement the `WireChatUser` contract**
   This contract tells WireChat that the model is eligible to participate in chats.
   It also defines key methods (such as panel authorization) that you may customize.

2. **Use the `InteractsWithWireChat` trait**
   This trait provides ready-made methods for starting conversations, sending messages, and working with groups.
   You can use it as-is or override specific behaviors to suit your application.

---

<x-section-heading label="Model Setup" />
This shows how to implement the WireChatUser contract and use the InteractsWithWireChat trait in your user model, enabling chat, group creation, and panel access. You can customize permissions by overriding the provided methods to control who can access panels or create chats and groups.
```php
namespace App\Models;

use Namu\WireChat\Panel\Panel;
use Namu\WireChat\Traits\InteractsWithWireChat;
use Namu\WireChat\Contracts\WireChatUser;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements WireChatUser
{
    use InteractsWithWireChat;

    /**
     * Decide if this user may access the given panel.
     * Here, only users with verified emails are allowed.
     */
    public function canAccessWireChatPanel(Panel $panel): bool
    {
        return $this->hasVerifiedEmail();
    }

    /**
     * Control whether this user is allowed to create 1-to-1 chats.
     */
    public function canCreateChats(): bool
    {
        return true;
    }

    /**
     * Control whether this user can create group conversations.
     */
    public function canCreateGroups(): bool
    {
        return true;
    }
}
````

---

With both the interface and the trait in place, your model is fully integrated with WireChat:
it can create and join chats, send messages, and respect whatever rules you define for panel and group access.

</x-markdown>

<x-slot name="subNavigation">
<x-sub-navigation :items="[
'Setup',
'Model Setup'
]"/>
</x-slot>

</x-docs-layout>
```

<x-docs-layout>

<x-markdown>

# Trait Customization

WireChat lets you customize user attributes like avatar URLs, profile links, and display names to better fit
your application's needs.

### Customizing the User Model

To enable these customizations, add the `InteractsWithWireChat` trait to your `User` model and override the following methods
as needed.

```php

use App\Traits\InteractsWithWireChat;
use Illuminate\Database\Eloquent\Collection;

class User extends Model
 {
    use InteractsWithWireChat;

    /**
    * Returns the URL for the user's cover image (avatar).
    * Adjust the 'avatar_url' field to your database setup.
    */
    public function getCoverUrlAttribute(): ?string
    {
      return $this->avatar_url ?? null;
    }

    /**
    * Returns the URL for the user's profile page.
    * Adjust the 'profile' route as needed for your setup.
    */
    public function getProfileUrlAttribute(): ?string
    {
      return route('profile', ['id' => $this->id]);
    }

    /**
    * Returns the display name for the user.
    * Modify this to use your preferred name field.
    */
    public function getDisplayNameAttribute(): ?string
    {
      return $this->name ?? 'user';
    }


    /**
    * Determine if the user can create new groups.
    */
    public function canCreateGroups(): bool
    {
      return $this->hasVerifiedEmail();
    }

    /**
    * Determine if the user can create new groups with other users
    */
    public function canCreateChats(): bool
    {
     return $this->hasVerifiedEmail();
    }

}
```

</x-markdown>

</x-docs-layout>

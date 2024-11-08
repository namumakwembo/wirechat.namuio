
<x-docs-layout>

<x-markdown>

## Trait Customization

WireChat lets you customize user attributes like avatar URLs, profile links, and display names to better fit your application's needs.

### Example: Customizing the User Model

To enable these customizations, add the `Chatable` trait to your `User` model and override the following methods as needed.

```php
use App\Traits\Chatable;
use Illuminate\Database\Eloquent\Collection;

class User extends Model
{
    use Chatable;

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
    * Search for users when creating a new chat or adding members to a group.
    * Customize the search logic to limit results, such as restricting to friends or eligible users only.
    */
   public function searchChatables(string $query): ?Collection
   {
       $searchableFields = ['name', 'username'];
   
       return User::whereAny($searchableFields, 'LIKE', '%' . $query . '%')
                   ->where('id', '!=', $this->id) // Exclude the current user
                   // Example: Add conditions to limit results to friends or eligible users
                   // ->whereHas('friends', fn($query) => $query->where('friend_id', $this->id))
                   // ->where('can_receive_messages', true)
                   ->limit(20)
                   ->get();
   }
   
}
```


</x-markdown>
    
    </x-docs-layout>
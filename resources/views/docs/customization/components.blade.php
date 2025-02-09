

<x-docs-layout>

<x-markdown>

# Extending WireChat Components

In addition to view level tweaks, you may want to add **new features** or **override certain behaviors** in the underlying Livewire components  for instance, adding a method to retrieve chat analytics, or injecting custom business logic when a new conversation starts.

---

## Why Extend Components Instead of Editing the Package?

When you edit the package’s core files, upgrading to the latest version can become risky. Extending WireChat components in your own namespace prevents conflicts and keeps your custom changes safe during package updates.

---

## Example: Overriding the `Chats` Component

Suppose you want an extra method called `test()`, which logs a special message whenever a user clicks a button in the chat list.

### 1. Create Your Custom Component

Use Laravel’s artisan command to scaffold a new Livewire component:

```bash
php artisan make:livewire Chats --inline
```

This will generate a file under your `app/Livewire` directory (adjust the namespace or path as needed).

### 2. Extend the Base WireChat Component

Open your newly created component and have it extend the **WireChat** base class. In this example, we’re extending `Namu\WireChat\Livewire\Chats\Chats`:

```php
namespace App\Livewire\Chats;

use Livewire\Component;
use Namu\WireChat\Livewire\Chats\Chats as BaseChats;

class Chats extends BaseChats
{
    // Add or override methods as needed
    public function test()
    {
        dd('Custom behavior activated!');
    }
}
```

> **Note:** You can omit the `render()` method if you don’t need to change the component’s default view.

### 3. Register Your Custom Component

In your `AppServiceProvider` (or another service provider), “tell” Livewire to use your new `Chats` class whenever the `chats` component is referenced in Blade:

```php
use Livewire\Livewire;

public function boot(): void
{
    Livewire::component('chats', \App\Livewire\Chats\Chats::class);
}
```

From now on, whenever you use `@<livewire:chats />` in your Blade files, **your** custom class will be called.

### 4. Update the Blade View to Call Your New Method

If you published the `chats.blade.php` file, you can add a button to invoke your new `test()` method:

```blade
<button wire:click="test">
    Test
</button>
```

When clicked, this button will trigger the `test()` method in your custom Chats component, logging the “Custom behavior activated!” message. You can then adapt this method to do anything you like  query the database, send notifications, or integrate with external APIs.



View a list of available [Wirechat components]({{route('customization.core-components')}})

---


## Next Steps

1. **Explore Other WireChat Components**  
   The approach you used for overriding one component applies to any other base component in WireChat (e.g., `chat`, `new-group`, etc.). Just extend the corresponding class and register it in your application’s service provider.

2. **Combine With Custom Views**  
   If you published WireChat’s views, you can link your newly added methods directly to UI elements (buttons, links, or forms) in the Blade files. This way, your users can interact with the custom logic you’ve introduced.

3. **Keep Things Organized**  
   Use clear namespaces and folder structures for any extended components, especially if you plan to override multiple classes. This will keep your codebase maintainable and easy to update.

4. **That’s It!**  

By **extending WireChat’s Livewire components**, you gain full control over both the **frontend** and **backend** of your chat system—adding functionality without needing to modify the original package files, and ensuring updates won’t overwrite your work.

</x-markdown>
    
    
    
    </x-docs-layout>
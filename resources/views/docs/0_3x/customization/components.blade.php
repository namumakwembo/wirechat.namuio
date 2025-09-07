

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

### 2. Extend the Base Chats Component

Open your newly created component and have it extend the **Chats** base class. In this example, we’re extending `Wirechat\Wirechat\Livewire\Chats\Chats`:

```php
namespace App\Livewire\Chats;

use Livewire\Component;
use Wirechat\Wirechat\Livewire\Chats\Chats as BaseChats;

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
    Livewire::component('wirechat.chats', \App\Livewire\Chats\Chats::class);
}
```

From now on, whenever you use @verbatim `<livewire:wirechat.chats />` @endverbatim in your Blade files, **your** custom class will be called.

### 4. Update the Blade View to Call Your New Method

Now in your published chats blade file, you can add a button to invoke your new `test()` method:

```blade
<button wire:click="test">
    Test
</button>
```

When clicked, this button will trigger the `test()` method in your custom Chats component, logging the “Custom behavior activated!” message. You can then adapt this method to do anything you like  query the database, send notifications, or integrate with external APIs.



View a list of available [Wirechat components]({{route('customization.core-components')}})

</x-markdown>



    </x-docs-layout>

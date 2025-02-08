

<x-docs-layout>

<x-markdown>

# Customizing Views 

Sometimes you may want to tweak the user interface or add new behaviors without editing vendor files. With WireChat, you can easily customize both the UI and backend logic through published views and extended Livewire components.

---

## Publishing Views

If you'd like to modify the UI—maybe add extra buttons or change the layout—you can publish the package's Blade views into your project. This gives you full control over the design.

**Publish the views by running:**

```bash
php artisan vendor:publish --tag=wirechat-views
```

This copies the views to: `resources/views/vendor/wirechat/`


You can now edit these files to fit your needs.

---

## Extending Livewire Components for Custom Behavior

Sometimes, you need to extend the backend functionality. Instead of changing the package directly, you can extend its Livewire components.

### Overriding WireChat Components

For example,you may wish to add an extra method to `Chats` component

1. **Create Your Custom Component**

```php
php artisan make:livewire Chats --inline
```

In your new component you need to extend the base component you wish to override;

```php
namespace App\Livewire\Chats;

use Livewire\Component;
use Namu\WireChat\Livewire\Chat\Chats as BaseChats;

class Chats extends BaseChats
{
    // Add or override methods as needed
    public function test()
    {
        dd('Custom behavior activated!');
    }
}
```

**Note:** You can omit the render method if you don't need to change the view


2. **Register Your Custom Component**

In the boot method your `AppServiceProvider`, register your component so it replaces the default:

```php
use Livewire\Livewire;

public function boot(): void
{
    Livewire::component('chats', \App\Livewire\WireChat\Chats::class);
}
```

so now in your published `chats` blade components you can add a button for method

```php 
<button wire:click="test">
    test
</button>
```

Now, when is rendered, your custom version will be used.

---

## Final Thoughts

WireChat makes it simple to adjust both the look and functionality of its components. Whether you’re enhancing the UI or extending component logic, these approaches help you build a tailored chat experience without worrying about vendor file modifications.


---
</x-markdown>
    
    
    
    </x-docs-layout>
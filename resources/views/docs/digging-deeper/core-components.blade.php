<x-docs-layout>
<x-markdown>

# Core Components

WireChat is built on top of Laravel Livewire, providing a set of **core components** that handle everything from listing conversations to creating new groups. Whether you’re customizing chat features or building new interfaces on top of WireChat, understanding these components is crucial. Each one can be **extended** or **overridden** in your own namespace, giving you the flexibility to adapt WireChat’s functionality without modifying the package itself.

<x-sub-section-heading label="Available Wirechat Livewire Components" />

Below is an overview table of WireChat’s Livewire components. Each entry shows its **default Livewire identifier** (used in Blade), the **namespace** where you’ll find the class, and any **required parameters**  such as a `conversation` model  needed for proper functionality.

| **Livewire Identifier** | **Namespace / Class**                                          | **Parameters**                      |
|-------------------------|----------------------------------------------------------------|-------------------------------------|
| index                 | `Namu\WireChat\Livewire\Index`                                 | *None* (No explicit param)          |
| view                  | `Namu\WireChat\Livewire\View`                                  | `conversation`                      |
| chat                  | `Namu\WireChat\Livewire\Chat\Chat`                             | `conversation`                      |
| chats                 | `Namu\WireChat\Livewire\Chats\Chats`                           | *None*                               |
| new-chat              | `Namu\WireChat\Livewire\Components\NewChat`                    | *None* (No explicit param)          |
| new-group             | `Namu\WireChat\Livewire\Components\NewGroup`                   | *None* (No explicit param)          |
| info                  | `Namu\WireChat\Livewire\Info\Info`                             | `conversation`                      |
| add-members           | `Namu\WireChat\Livewire\Info\AddMembers`                       | `conversation`                      |
| members               | `Namu\WireChat\Livewire\Info\Members`                          | `conversation`                      |
| permissions           | `Namu\WireChat\Livewire\Group\Permissions`                     | `conversation`                      |

### Notes & Tips

- **Overriding or Extending Components**  
    If you want to customize a component (e.g., to add extra methods or modify its behavior), create a new class that extends the original namespace and register it under the same **Livewire identifier** in your service provider.
    [**Available WireChat Components**]({{ route('customization.core-components') }})
- **Parameters**  
    Some components (like `info` or `add-members`) rely on a `conversation` model instance to function. Make sure to pass the relevant data to these components whenever you instantiate them or navigate to their routes.

- **Published Views**  
    If you have published WireChat’s views, you can modify or add UI elements (such as extra buttons or forms) to interact directly with your extended component logic.

By **extending WireChat’s Livewire components**, you gain complete control over both the **frontend** and **backend** aspects of your chat system  allowing you to add new features or integrate additional business logic without ever needing to directly edit the package source.

</x-markdown>
</x-docs-layout>
            
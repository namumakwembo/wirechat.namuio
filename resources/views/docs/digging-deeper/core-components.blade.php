<x-docs-layout>
<x-markdown>

# Core Components

WireChat is built on top of Laravel Livewire, providing a set of **core components** that handle everything from listing conversations to creating new groups. Whether you’re customizing chat features or building new interfaces on top of WireChat, understanding these components is crucial. Each one can be **extended** or **overridden** in your own namespace, giving you the flexibility to adapt WireChat’s functionality without modifying the package itself.

<x-section-heading label="Available Wirechat Livewire Components" />

Below is an overview table of WireChat’s Livewire components. Each entry shows its **default Livewire identifier** (used in Blade), the **namespace** where you’ll find the class, and any **required parameters**  such as a `conversation` model  needed for proper functionality.


| **Livewire Identifier**          | **Namespace / Class**                                       | **Parameters**    |
|----------------------------------|------------------------------------------------------------|-------------------|
| wirechat                         | `Namu\WireChat\Livewire\Widgets\WireChat`                  | None   (No explicit param)  |
| wirechat.chat                    | `Namu\WireChat\Livewire\Chat\Chat`                         | `conversation`    |
| wirechat.chat.info               | `Namu\WireChat\Livewire\Chat\Info`                         | `conversation`    |
| wirechat.chat.group.add-members  | `Namu\WireChat\Livewire\Chat\Group\AddMembers`             | `conversation`    |
| wirechat.chat.group.members      | `Namu\WireChat\Livewire\Chat\Group\Members`                | `conversation`    |
| wirechat.chat.group.permissions  | `Namu\WireChat\Livewire\Chat\Group\Permissions`            | `conversation`    |
| wirechat.chats                   | `Namu\WireChat\Livewire\Chats\Chats`                       | None (No explicit param)  |
| wirechat.new.chat                | `Namu\WireChat\Livewire\New\Chat`                          | None (No explicit param)  |
| wirechat.new.group               | `Namu\WireChat\Livewire\New\Group`                         | None              |
| wirechat.pages.index             | `Namu\WireChat\Livewire\Pages\Chats`                       | None   (No explicit param)  |
| wirechat.pages.view              | `Namu\WireChat\Livewire\Pages\Chat`                        | `conversation`    |


<x-section-heading label="Notes & Tips" key="Notes & Tips" />

- **Overriding or Extending Components**  
    If you want to customize a component (e.g., to add extra methods or modify its behavior), create a new class that extends the original namespace and register it under the same **Livewire identifier** in your service provider.
    [**Available WireChat Components**]({{ route('customization.components') }})
- **Parameters**  
    Some components (like `wirechat.chat` or `wirechat.pages.view`) rely on a `conversation` model instance to function. Make sure to pass the relevant data to these components whenever you instantiate them or navigate to their routes.


</x-markdown>


<x-slot name="subNavigation">

    <x-sub-navigation :items="[
          'Available Wirechat Livewire Components',
          'Notes & Tips'
           ]"/>
  
  </x-slot>

</x-docs-layout>
            
<x-docs-layout>
<x-markdown>

# Core Components

WireChat is built on top of Laravel Livewire, providing a set of **core components** that handle everything from listing conversations to creating new groups. Whether you’re customizing chat features or building new interfaces on top of WireChat, understanding these components is crucial. Each one can be **extended** or **overridden** in your own namespace, giving you the flexibility to adapt WireChat’s functionality without modifying the package itself.

<x-section-heading label="Available Wirechat Livewire Components" />

Below is an overview table of WireChat’s Livewire components. Each entry shows its **default Livewire identifier** (used in Blade), the **namespace** where you’ll find the class, and any **required parameters**  such as a `conversation` model  needed for proper functionality.


| **Livewire Identifier**          | **Namespace / Class**                                       | **Parameters**    |
|----------------------------------|------------------------------------------------------------|-------------------|
| wirechat                         | `Wirechat\Wirechat\Livewire\Widgets\WireChat`                  | None   (No explicit param)  |
| wirechat.chat                    | `Wirechat\Wirechat\Livewire\Chat\Chat`                         | `conversation`    |
| wirechat.chat.info               | `Wirechat\Wirechat\Livewire\Chat\Info`                         | `conversation`    |
| wirechat.chat.group.add-members  | `Wirechat\Wirechat\Livewire\Chat\Group\AddMembers`             | `conversation`    |
| wirechat.chat.group.members      | `Wirechat\Wirechat\Livewire\Chat\Group\Members`                | `conversation`    |
| wirechat.chat.group.permissions  | `Wirechat\Wirechat\Livewire\Chat\Group\Permissions`            | `conversation`    |
| wirechat.chats                   | `Wirechat\Wirechat\Livewire\Chats\Chats`                       | None (No explicit param)  |
| wirechat.new.chat                | `Wirechat\Wirechat\Livewire\New\Chat`                          | None (No explicit param)  |
| wirechat.new.group               | `Wirechat\Wirechat\Livewire\New\Group`                         | None              |


<x-section-heading label="Notes & Tips" key="Notes & Tips" />

- **Overriding or Extending Components**
    If you want to customize a component (e.g., to add extra methods or modify its behavior), create a new class that extends the original namespace and register it under the same **Livewire identifier** in your service provider.
    [**Available WireChat Components**]({{ route('customization.components') }})
- **Parameters**
    If you have multiple panels defined, ensure that you pass the panel-id parameter to the components. Some components also rely on a conversation model instance to function, so make sure to provide the necessary data whenever you instantiate these components or navigate to their routes.

</x-markdown>


<x-slot name="subNavigation">

    <x-sub-navigation :items="[
          'Available Wirechat Livewire Components',
          'Notes & Tips'
           ]"/>

  </x-slot>

</x-docs-layout>

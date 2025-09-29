<x-docs-layout>

<x-markdown>

# Layout

The chat system is designed to fit seamlessly into **any** Laravel application. By default, when you visit the panel index route, it uses its built-in layout. However, you may want to keep your existing header, footer, or navigation bar. You can easily override the default layout to match your application’s style.

<x-section-heading label="Overriding the Default Layout" />

By default, WireChat uses the package layout `wirechat::layouts.app`.
You can replace this layout by defining your own via the panel:

```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    return $panel
        ->id('chats')
        ->layout('layouts.app'); // Your custom Blade layout
}
```

---

<x-section-heading label="Setting Up Your Layout" />

For the chat system to work properly, you’ll need to include the **required styles and assets**.
These files handle global styling, modals, and Livewire functionality. Add them directly to your Blade layout so they’re always available.

```html{3,6,9}
<html>
   <head>
    @@wirechatStyles
   </head>
  <body>
    <div class="h-[calc(100vh_-_20rem)]">
        @{{ $slot }}
    </div>
   @@wirechatAssets(panel:'chats')
  </body>
</html>
```

1. **`@@wirechatStyles`** injects the necessary CSS for the chat.
2. **`@{{ $slot }}`** is where your main page content or chat interface will appear.
3. **`@@wirechatAssets`** loads the JavaScript and Livewire directives for real-time updates.

By default, the main panel will be used.
You can also pass your own panel ID to the WireChat assets directive like this:
`@@wirechatAssets(panel:'app')`

> **Tip:** Wrap the chat area in a container with a **fixed height**. This ensures messages display correctly and keeps your UI consistent.

Once everything is set up, visiting `/chats` will show the chat within your custom layout, giving users a seamless experience across your site.

For embedding chat components on specific pages or sections, see the [Embedding]({{ docs()->route('customization.embedding') }}) section for more advanced options.

</x-markdown>

<x-slot name="subNavigation">
<x-sub-navigation :items="['Overriding the Default Layout','Setting Up Your Layout']"/>
</x-slot>

</x-docs-layout>

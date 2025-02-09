

<x-docs-layout>

<x-markdown>

# Layout

WireChat is designed to fit seamlessly into **any** Laravel application. By default, when you visit the `/chats` route, WireChat uses its own built-in layout. However, you may want to keep the look and feel of your existing site. Perhaps you already have a branded header, footer, or navigation bar that you’d like to retain. In that case, you can easily override WireChat’s default layout to match your application’s style.

<x-section-heading label="Overriding the Default Layout" />

To replace the standard WireChat layout with your own, open the WireChat configuration file and update the `layout` key:

```php
return [
    // ...
    'layout' => 'wirechat::layouts.app',
];
```

Here, `'wirechat::layouts.app'` is just an example. Feel free to use **any** layout path that exists in your application  just make sure you keep the syntax correct.

---

<x-section-heading label="Setting Up Your Layout" />

Before WireChat can use your custom layout, you need to include **WireChat styles** and **assets**. These files power global styling and modals across WireChat’s components. You can add them directly to your Blade layout so that they’re always loaded.

Here’s a basic layout structure:

```blade{3,6,9}
<html>
<head>
    @@wirechatStyles
</head>
<body>
    <div class="h-[calc(100vh_-_20.0rem)]">
        @{{ $slot }}
    </div>
    @@wirechatAssets
</body>
</html>
```

1. **`@@wirechatStyles`** injects the necessary CSS and style definitions for WireChat.  
2. **`@{{ $slot }}`** is where your main page content (or in this case, your chat interface) will appear.  
3. **`@@wirechatAssets`** loads the essential JavaScript files and Livewire directives that power real-time chat updates.

> **Tip:** Make sure to wrap the chat area in a container with a **fixed height**. WireChat dynamically inserts and updates chat messages in real time, so having a stable height prevents layout issues and keeps your UI looking neat.

With everything set, just navigate to the `/chats` route in your browser. WireChat should now display in **your** custom layout rather than the default one. This way, your users will have a consistent experience  whether they’re reading a blog post, browsing products, or chatting with others in your application.

---

Once you’ve overridden the layout, you’re ready to take full advantage of WireChat’s features, all without sacrificing your site’s unique branding or style. If you need more fine grained control  such as embedding WireChat widgets into specific pages or sections  check out the additional configuration options in the  [Embedding]({{route('customization.embedding')}}) section.

</x-markdown>
    

<x-slot name="subNavigation">

    <x-sub-navigation :items="['Overriding the default Layout','Setting up your layout']"/>

</x-slot>
    
    
</x-docs-layout>


<x-docs-layout>

<x-markdown>


# Layout  

By default, Wirechat uses its default layout when you visit the `/chats` route. However, you may want to render the chat inside a different layout to better integrate with your application. To achieve this, you can set your desired layout in the **Wirechat** configuration file.  


<x-section-heading label="Overriding the default Layout" />

To override the default layout, update the  `layout` key in the Wirechat configuration file:  

```php
return [
    //...
    'layout' => 'wirechat::layouts.app',
];
```

This allows Wirechat to use your custom layout instead of the default one.

---

<x-section-heading label="Setting up your layout"/>

Before using your custom layout, you need to include **Wirechat styles and assets**. These are necessary for loading global styles and modals used by Wirechat components.  

Here’s an example of how your layout file should be structured:  

```php{3,6,9}
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

 
> **Note:** Set a **fixed height** for the chat slot to prevent layout issues and ensure messages load correctly as Wirechat dynamically adds content.

Once you've set up your custom layout, simply visit your `/chats` route, and Wirechat will be displayed using your layout.  
</x-markdown>
    

<x-slot name="subNavigation">

    <x-sub-navigation :items="['Overriding the default Layout','Setting up your layout']"/>

</x-slot>
    
    
</x-docs-layout>
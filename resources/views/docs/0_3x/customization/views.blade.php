

<x-docs-layout>

<x-markdown>

# Wirechat Views

WireChat’s default Blade views are designed to give you a seamless real-time chat interface right out of the box. Sometimes, though, you need that extra layer of customization  like adding a button to start a new conversation, tweaking labels, or inserting custom UI elements. **Publishing** the views into your own `resources` directory allows you to make these modifications without editing vendor files directly.

---

## Publishing the Views

Publishing WireChat’s views will copy them from the package into your application’s `resources/views/vendor/wirechat/` directory. Here’s how you do it:

```bash
php artisan vendor:publish --tag=wirechat-views
```

Once you run this command, any view file in `resources/views/vendor/wirechat/` will automatically override the default files included with the WireChat package. 

> **💡 Why is this helpful?**  
> Because you can make changes  like changing text labels, adding custom CSS classes, or rearranging HTML layouts  directly in your local files. That way, your changes won’t be lost during package updates.


---

## **Next Steps**

1. **Combine With Extended Components**  
   If you’re also extending any WireChat Livewire components, you can integrate new logic (like custom methods or event handling) into your published views. Add buttons, forms, or UI elements that call methods in your custom components.

2. **Keep Things Organized**  
   Maintain a clear file structure for your customized views. This ensures that you can easily track changes, especially if you’re managing multiple custom Blade files across different parts of your application.

3. **That’s It!**  
   By **publishing and customizing** the WireChat views, you have **complete control** over the look and feel of your chat interface without worrying about future package updates overwriting your changes.

</x-markdown>
    
    
    
    </x-docs-layout>
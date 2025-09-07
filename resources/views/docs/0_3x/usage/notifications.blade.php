
<x-docs-layout>

 <x-markdown>

# Web Push Notifications

Wirechat keeps you connected to your conversations even when you're not actively using the app. Unlike in-app alerts, these are global
notifications that appear in your browser’s notification tray. By harnessing the power of
[**Service Workers**](https://developer.mozilla.org/en-US/docs/Web/API/Service_Worker_API)
and the [**Web Notifications API**](https://developer.mozilla.org/en-US/docs/Web/API/Notification),
Wirechat ensures you never miss an important message, no matter which tab or application you're using.

<x-section-heading label="How It Works" />

Wirechat’s service worker manages notifications by:
- Displaying alerts when the app isn’t in focus.
- Automatically dismissing notifications when the related conversation is opened.
- Using **tags** based on conversation IDs to prevent duplicate alerts.


<x-section-heading label="Installation"/>

Publish the required service worker scripts with:

```sh
php artisan wirechat:setup-notifications
```

This command will:
- Publish Wirechat’s service worker to `public/js/wirechat/sw.js`.
- Publish the main service worker script to `public/sw.js`.


<x-sub-section-heading label="Importing Wirechat's Service Worker" />

If you have a custom `sw.js`, simply import Wirechat’s service worker by adding:

```javascript
importScripts('/js/wirechat/sw.js');
```

<x-section-heading label="Enabling Notifications" />

Enable web push notifications in the your wirechat:panel
```php
use Wirechat\Wirechat\Panel;

public function panel(Panel $panel): Panel
{
    $panel
        //..
         ->webPushNotifications();
}
```

<x-section-heading label="Requesting Permissions" />

Before sending any alerts, Wirechat prompts users for notification permissions automatically.

<x-section-heading label="Notification Lifecycle" />

When a new message arrives while you’re away from the conversation, a notification is triggered. These notifications:
- Appear in the browser’s tray without cluttering your interface.
- Use **tags** to prevent duplicates.
- Automatically close when clicked, redirecting you to the corresponding conversation in a new or existing tab.


<x-section-heading label="Limitations" />


<x-sub-section-heading label="Notification API" />

- **User Permissions & Settings:**
  Notifications require explicit permission, and users might need to enable them in their browser or system settings.
- **Policy Constraints:**
  Notification behavior (such as sound, display duration, and interactions) is controlled by browser and OS policies.

<x-sub-section-heading label="Service Worker API" />

- **Secure Context:**
  Service Workers only run on HTTPS (except on localhost during development).
- **Lifecycle & Support:**
  They’re event-driven and may be terminated when idle, with feature support varying across browsers.

---

<x-section-heading label="Conclusion" />

Wirechat offers a streamlined solution for real-time notifications, ensuring your users stay informed with minimal setup. Enjoy a smart, unobtrusive notification system that keeps your conversations accessible at all times.

    </x-markdown>

    <x-slot name="subNavigation">

      <x-sub-navigation :items="[
            'How It Works',
            'Installation'=>['Importing Wirechat\'s Service Worker'],
            'Enabling Notifications',
            'Requesting Permissions',
            'Notification Lifecycle',
            'Limitations'=>[
                'Notification API',
                'Service Worker API'
            ],
            'Conclusion',
            ]
            "/>

    </x-slot>




    </x-docs-layout>

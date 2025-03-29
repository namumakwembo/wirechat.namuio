
<x-docs-layout>

<x-markdown> 
## Installation

Wirechat is a simple yet robust chat package built with the [TALL Stack](https://tallstack.dev/), making it easy to integrate into your Laravel app with just a few commands.

---

## Prerequisites

Before you begin, ensure the following are installed:

* PHP version 8.2 or later
* Laravel version 10 or later
* Livewire version 3.2.3 or later

---

## Installing

### 1. Require the package via Composer

Before installing, ensure that authentication is already set up in your application. For more information, check out [Laravel Breeze](https://laravel.com/docs/11.x/starter-kits#laravel-breeze)

```bash
composer require namu/wirechat
```

>⚠️ Beta Notice: Wirechat is currently in beta. While it may not yet be production-ready, we encourage you to explore and test it out. If you encounter any issues, your feedback will be invaluable in helping us refine and improve the package for a stable release.  


### 2. Install Wirechat

<x-sub-section-heading tag='h5' label="Run the installation command" />


Run this command to install and publish the necessary files:

```bash
php artisan wirechat:install
```

The following actions will be executed:
   * Publish configuration file
   * Publish migration files
   * Create a storage symlink

<x-sub-section-heading tag='h5' label="Publishing translations" />
You can publish the language files for translations (if needed) with the following command:
```php
php artisan vendor:publish --tag=wirechat-translations
```

### 3. Run Migrations:

Apply the necessary database migrations with:

```bash
php artisan migrate
```
---

### Optimizing Tailwind CSS for Production  

To ensure Tailwind purges CSS classes from the package, add the following lines to your `/resources/css/app.css` file:  

```css
/* resources/css/app.css */

@source '../../vendor/namu/wirechat/resources/views/**/*.blade.php';
@source '../../vendor/namu/wirechat/src/Livewire/**/*.php';
```

<details class="my-9">  
<summary>Using Tailwind CSS v3?</summary>  

If you're using Tailwind CSS v3, update the `content` array in your `tailwind.config.js` file to include these paths:  

```js
content: [
  './vendor/namu/wirechat/resources/views/**/*.blade.php',
  './vendor/namu/wirechat/src/Livewire/**/*.php'
]
```
</details>  

---

### WebSockets and Queue Setup

Wirechat uses WebSockets to broadcast messages in real-time to conversations and their participants.

#### Step 1: Enable Broadcasting

In newer Laravel installations, broadcasting is disabled by default. To enable it, run:

```bash
php artisan install:broadcasting
```

**Note**: This command will prompt you to install Laravel Reverb and necessary front-end packages such as Echo. Accept if you don’t yet have a WebSocket server set up.

Then, start your Reverb server:

```bash
php artisan reverb:start
```

For more details, refer to the [Laravel Broadcasting Documentation](https://laravel.com/docs/11.x/broadcasting), including information on integrating Laravel Echo for real-time updates.

#### Step 2: Start Your Queue Worker

After configuring broadcasting, start a [queue worker](https://laravel.com/docs/11.x/queues#driver-prerequisites) to handle message broadcasting and other queued tasks:

```bash
php artisan queue:work --queue=messages,default
```

<details class="my-9">

<summary> Queue Prioritization </summary>

Wirechat uses two queues for efficient delivery:  

1. **High Priority (`messages`)**: For real-time broadcasting of messages to users in a conversation.  
2. **Default Priority (`default`)**: For notifications like updating chat lists or showing unread message counts.  

You can customize these queue names in the [Wirechat Configuration]({{ route('customization.config') }}).  

</details>  

#### Step 3: Step Development Server

To start your development server, run:

```bash
composer run dev
```



If you're not running the latest Laravel version, you can run: `php artisan serve` && `npm run dev` seperately

For more details, see [Laravel's Tailwind and Composer Dev Command Documentation](https://laravel-news.com/laravel-11-28-0#content-add-tailwind-and-composer-run-dev-command).


</x-markdown>

    


</x-docs-layout>
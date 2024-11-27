
<x-docs-layout>

<x-markdown> 
## Installation

Wirechat is a simple yet robust chat package built with the TALL stack, making it easy to integrate into your Laravel app with just a few commands.

---

## Prerequisites

Before you begin, ensure the following are installed:

* PHP version 8.1 or later
* Laravel version 10 or later
* Livewire version 3.2.3 or later

---

## Installing

### 1. Install the package via Composer

Before installing, ensure that authentication is already set up in your application. For more information, check out [Laravel Breeze](https://laravel.com/docs/11.x/starter-kits#laravel-breeze)

```bash
composer require namu/wirechat
```

### 2. Run the installation command

Run this command to install and publish the necessary files:

```bash
php artisan wirechat:install
```

The following actions will be executed:
   * Publish configuration file
   * Publish migration files
   * Create a storage symlink

---

### Building Tailwind CSS for Production

To purge the CSS classes used by the package, add these lines to the `purge` array in `tailwind.config.js`:

```js
   './wirechat/resources/views/**/*.blade.php',
   './wirechat/src/Livewire/*.php',
```

---

### WebSockets and Queue Setup

Wirechat uses WebSockets to broadcast messages in real-time to conversations and their participants.

#### Step 1: Enable Broadcasting

In newer Laravel installations, broadcasting is disabled by default. To enable it, run:

```bash
php artisan install:broadcasting
```

This command sets up the necessary broadcasting configurations for your application.
> **Note**: This command will prompt you to install Laravel Reverb and necessary front-end packages such as Echo. Accept if you don’t yet have a WebSocket server set up.

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

#### Queue Prioritization

Wirechat leverages two separate queues to ensure efficient delivery of messages and notifications:

1. **High Priority**: The `messages` queue is used for broadcasting messages to users subscribed to a conversation. This ensures fast and near-instantaneous delivery for real-time communication.

2. **Default Priority**: The `default` queue is used for broadcasting notifications about new messages to users outside the conversation, such as updating the chat list or showing unread message counts.

#### Customizing Queues

If your application already uses queues, you can integrate Wirechat seamlessly by customizing the queue names it uses. Refer to the [Wirechat Configuration]({{ route('customization.config') }}) section of the documentation for details on how to modify the default settings.


#### Step 3: Run Migrations

Apply the necessary database migrations with:

```bash
php artisan migrate
```

#### Step 4: Step Development Server

To start your development server, run:

```bash
composer run dev
```

If you're not running the latest Laravel version, you can run: `php artisan serve` && `npm run dev` seperately

For more details, see [Laravel's Tailwind and Composer Dev Command Documentation](https://laravel-news.com/laravel-11-28-0#content-add-tailwind-and-composer-run-dev-command).


</x-markdown>

    


</x-docs-layout>
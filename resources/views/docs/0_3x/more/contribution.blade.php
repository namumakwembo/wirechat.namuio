<x-docs-layout>
<x-markdown>

# Contribution Guide

Thanks for contributing to Wirechat! We're excited to have you help improve the project. Here's how to get started:

1. Create a new branch before making any edits. Do not push directly to `main`. For example: `fix/your-branch` or `feat/your-branch`.

2. Try to limit changes to only the necessary files and lines. This helps keep things clean and makes reviewing easier.

3. Run tests to make sure your changes don’t break anything. Add new tests if you're adding features or fixing bugs.

4. Create your pull request with a clear description of what you've changed. Reference any related issues (e.g., "Fixes #123") and request a review from a maintainer.


### Setting up your environment


1. Create a new Laravel project in your workspace folder:

```bash
composer create-project laravel/laravel wirechat
cd wirechat
```

2. Install dependencies and set up authentication (Laravel Breeze with Livewire):

```bash
composer require laravel/breeze --dev
php artisan breeze:install
```

Choose the Livewire stack when prompted.

3. Set up websockets and broadcasting (using Reverb):

```bash
php artisan install:broadcasting
php artisan reverb:start
```
**Note:** The `install:broadcasting` command might prompt you to install Laravel Reverb and necessary front-end packages like Echo. Accept if you don't have a WebSocket server set up.

in a separate terminal window run:
```
php artisan queue:work --queue=messages,default
```


4. Start your development servers:

Backend server: `php artisan serve`

Frontend server: `npm run dev`

---

### Installing WireChat

1. Clone the Wirechat repository into the root of your project

```bash
git clone https://github.com/namumakwembo/wirechat.git
```


2. Add the Wirechat path to the `autoload-dev` section of your main `composer.json`

```json{}{5}
{
    "autoload-dev": {
        "psr-4": {
            "Tests\\": "tests/",
            "Wirechat\\Wirechat\\": "wirechat/src/"
        }
    }
}
```

3. Manually Register the Service Provider Open `bootstrap/providers.php` and add the service provider to the providers array:

```php{}{3}
'providers' => [
    // Other service providers...
    Wirechat\Wirechat\WireChatServiceProvider::class,
],
```

4. Install Wirechat and run migrations (from the root of your Laravel project)

```bash
php artisan wirechat:install
php artisan migrate
```

5. Purge CSS classes by the following to  `content` section in `tailwind.config.js`

```javascript
'./vendor/namu/wirechat/resources/views/**/*.blade.php',
'./vendor/namu/wirechat/src/Livewire/**/*.php'
```

6.Finally add the `InteractsWithWireChat` trait to your **User** model:

```php{}{6}
use Illuminate\Foundation\Auth\User as Authenticatable;
use Wirechat\Wirechat\Traits\InteractsWithWireChat;

class User extends Authenticatable
{
      use InteractsWithWireChat;

      ...
}
```

After this setup, you can visit the route `/chats` to start conversations, send messages, and more.

---

### Making Changes

1. navigate into the Wirechat directory and create a new branch:

```
cd wirechat
git checkout -b fix/your-branch-name
```


2. After you're done making changes , Run tests to make sure everything works as expected:
```bash
composer install
composer test
```

3. Commit your changes and push to your branch:
```
git add .
git commit -m "Your descriptive commit message"
git push origin fix/your-branch-name
```


4. Lastly  Create the pull request on GitHub. Provide a clear title and detailed description of your changes. Reference any related issues.

---

### Reporting Bugs and Suggesting Features

If you've found a bug or have a suggestion for a new feature, please open an issue on [GitHub.](https://github.com/namumakwembo/wirechat/issues/new/choose)


Thank you for contributing!

    </x-markdown>

    </x-docs-layout>

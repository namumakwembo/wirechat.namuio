<?php

use App\Support\DocsVersion;
use Illuminate\Support\Facades\Route;
use App\Helpers\Helper;


$docs = new DocsVersion('0.3x'); // Route version '' = latest


$routePrefix = $docs->getRouteVersion();


Route::prefix('docs/' . $routePrefix)
    ->as($routePrefix ? $routePrefix . '.' : '')
    ->group(function () use ($docs, $routePrefix) {

        Route::get('/', function () use ($routePrefix) {
            // Build the route name properly
            $routeName = $routePrefix ? $routePrefix . '.installation' : 'installation';
            return redirect()->route($routeName);
        })->name('docs');

        Route::get('/installation', function () use ($docs) {
            Helper::seo('Installation', 'Add realtime chat to your Laravel-Livewire application in minutes with Wirechat');
            return view('docs.' . $docs->getViewFolder() . '.installation');
        })->name('installation');

        Route::get('/setup', function () use ($docs) {
            Helper::seo('Setup', 'To prepare your models for WireChat, you need to integrate the `InteractsWithWireChat` trait. Because WireChat is polymorphic, you can add this trait to any model—not just the User model');
            return view('docs.' . $docs->getViewFolder() . '.setup');
        })->name('setup');


        Route::get('/panels', function () use ($docs) {
            Helper::seo('Panels', "WireChat panel unifies a variety of high-level package behavior settings that were previously scattered throughout your application's file structure. From this panel, you may now customize your package's routing, middleware, features, searches, and more.");

            return view('docs.' . $docs->getViewFolder() . '.panels');
        })->name('panels');

        /**----------------
         * Usage
         */
        Route::get('/overview', function () use ($docs) {
            Helper::seo('Overview', 'Learn how to send messages using Wirechat in your Laravel Livewire application');
            return view('docs.' . $docs->getViewFolder() . '.usage.overview');
        })->name('usage.overview');


        Route::get('/aggregations', function () use ($docs) {
            Helper::seo('Aggregations', 'Discover how to retrieve aggregate data,to enhance data handling and performance in Laravel Livewire chat application');
            return view('docs.' . $docs->getViewFolder() . '.usage.aggregations');
        })->name('usage.aggregations');

        Route::get('/attachments', function () use ($docs) {
            Helper::seo('Attachments', 'The Wirechat Attachments feature allows users to share files and media in conversations, enhancing the communication experience.');

            return view('docs.' . $docs->getViewFolder() . '.usage.attachments');
        })->name('usage.attachments');

        Route::get('/notifications', function () use ($docs) {
            Helper::seo('Notifications', 'Wirechat offers a simple and efficient way to handle real-time push notifications using the Service Worker API and the Web Notifications API');

            return view('docs.' . $docs->getViewFolder() . '.usage.notifications');
        })->name('usage.notifications');

        Route::get('/events', function () use ($docs) {
            Helper::seo('Events', 'Wirechat Events are used to notify users of changes in the chat application, such as new messages, group updates, and more.');

            return view('docs.' . $docs->getViewFolder() . '.usage.events');
        })->name('usage.events');


        /**----------------
         * Customization
         */


        Route::get('/users', function () use ($docs) {
            Helper::seo('Users', 'WireChat allows you to define how users are represented within your application.');
            return view('docs.' . $docs->getViewFolder() . '.customization.users');
        })->name('customization.users');

        Route::get('/authorization', function () use ($docs) {
            Helper::seo('Authorization', 'Wirechat offers flexible integration with multiple guards and middleware configurations to secure your application’s routes and broadcasting channels');
            return view('docs.' . $docs->getViewFolder() . '.customization.authorization');
        })->name('customization.authorization');


        Route::get('/layout', function () use ($docs) {
            Helper::seo('Layout', 'Customize Wirechat’s layout to seamlessly integrate with your application. Adjust UI components, themes, and structure to match your design requirements.');
            return view('docs.' . $docs->getViewFolder() . '.customization.layout');
        })->name('customization.layout');


        Route::get('/components', function () use ($docs) {
            Helper::seo('Customizing Components', 'Learn how to customize wirechat components in order to extentend functionality for backend interaction');
            return view('docs.' . $docs->getViewFolder() . '.customization.components');
        })->name('customization.components');

        Route::get('/views', function () use ($docs) {
            Helper::seo('Customizing Views', 'Learn how to customize and publish wirechat views in order to best fit your application style ');
            return view('docs.' . $docs->getViewFolder() . '.customization.views');
        })->name('customization.views');


        Route::get('/config', function () use ($docs) {
            Helper::seo('Configuration', 'Wirechat offers a variety of customization options through its configuration file. You can adjust settings such as themes, routes, and features to better suit your needs.');
            return view('docs.' . $docs->getViewFolder() . '.customization.config');
        })->name('customization.config');


        Route::get('/theme', function () use ($docs) {
            Helper::seo('Theme', 'WireChat supports full theme customization, allowing you to tailor the chat interface to match the look and feel of your application.');
            return view('docs.' . $docs->getViewFolder() . '.customization.theme');
        })->name('customization.theme');


        /**----------------
         * Digging deeper
         */

        Route::get('/embedding', function () use ($docs) {
            Helper::seo('Embedding', 'WireChat is designed with simplicity and flexibility in mind. Not only can you use the default <livewire:chats/> widget to embed a chat interface on any page of your application, but you can also integrate it into custom layouts.');

            return view('docs.' . $docs->getViewFolder() . '.digging-deeper.embedding');
        })->name('customization.embedding');


        Route::get('/core-components', function () use ($docs) {
            Helper::seo('Core-components', 'Here  is an overview table of WireChat’s Livewire components');

            return view('docs.' . $docs->getViewFolder() . '.digging-deeper.core-components');
        })->name('customization.core-components');

        /**----------------
         * Conversation
         * ----------------------
         */

        Route::prefix('rooms')->group(function () use ($docs) {

            Route::get('/chats', function () use ($docs) {
                Helper::seo('Chats', 'Learn how to manage , create and edit chats');
                return view('docs.' . $docs->getViewFolder() . '.rooms.chats');
            })->name('rooms.chats');

            Route::get('/groups', function () use ($docs) {
                Helper::seo('Groups', 'Learn how to manage , create and edit groups');
                return view('docs.' . $docs->getViewFolder() . '.rooms.groups');
            })->name('rooms.groups');

        });


        /**----------------
         * More
         */


        Route::get('/contribution', function () use ($docs) {
            Helper::seo('Contribution Guide', "Thanks for contributing to Wirechat! We're excited to have you help improve the project. Here's how to get started");
            return view('docs.' . $docs->getViewFolder() . '.more.contribution');
        })->name('more.contribution');


    });

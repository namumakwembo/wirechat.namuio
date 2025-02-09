<?php

use App\Helpers\Helper;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    Helper::seo('Home');
    return view('welcome');
});



// Route::get('/', function () {

//     Helper::seo('Home');
//     return view('test');
// });


Route::prefix('docs')->group(function () {
    Route::get('/', function () {
        Helper::seo('Introduction');
        return view('docs.introduction');
    })->name('docs');


    Route::get('/installation', function () {
        Helper::seo('Installation','Add realtime chat to your Laravel-Livewire application in minutes with Wirechat');
        return view('docs.installation');
    })->name('installation');


    /**----------------
     * Usage
     */

     Route::get('/overview', function () {
        Helper::seo('Overview','Learn how to send messages using Wirechat in your Laravel Livewire application');
        return view('docs.usage.overview');
    })->name('usage.overview');


    Route::get('/aggregations', function () {
        Helper::seo('Aggregations','Discover how to retrieve aggregate data,to enhance data handling and performance in Laravel Livewire chat application');
        return view('docs.usage.aggregations');
    })->name('usage.aggregations');

    Route::get('/groups', function () {
        Helper::seo('Groups','Learn how to create and manage groups in your Laravel Livewire chat application');
        return view('docs.usage.groups');
    })->name('usage.groups');

    Route::get('/attachments', function () {
        Helper::seo('Attachments','The Wirechat Attachments feature allows users to share files and media in conversations, enhancing the communication experience.');

        return view('docs.usage.attachments');
    })->name('usage.attachments');


    Route::get('/events', function () {
        Helper::seo('Events','Wirechat Events are used to notify users of changes in the chat application, such as new messages, group updates, and more.');

        return view('docs.usage.events');
    })->name('usage.events');

     
    /**----------------
     * Customization
     */


    Route::get('/trait', function () {
        Helper::seo('Trait','WireChat Chatable Trait lets you customize user attributes like avatar URLs, profile links, and display names to better fit your application\'s needs.');

        return view('docs.customization.trait');
    })->name('customization.trait');

    Route::get('/authorization', function () {
        Helper::seo('Authorization','Wirechat offers flexible integration with multiple guards and middleware configurations to secure your application’s routes and broadcasting channels');

        return view('docs.customization.authorization');
    })->name('customization.authorization');


    Route::get('/layout', function () {
        Helper::seo( 'Layout', 'Customize Wirechat’s layout to seamlessly integrate with your application. Adjust UI components, themes, and structure to match your design requirements.' );
        return view('docs.customization.layout');
    })->name('customization.layout');
    


    Route::get('/components', function () {
        Helper::seo('Customizing Components','Learn how to customize wirechat components in order to extentend functionality for backend interaction');

        return view('docs.customization.components');
    })->name('customization.components');

    Route::get('/views', function () {
        Helper::seo('Customizing Views','Learn how to customize and publish wirechat views in order to best fit your application style ');

        return view('docs.customization.views');
    })->name('customization.views');


    Route::get('/config', function () {
        Helper::seo('Configuration','Wirechat offers a variety of customization options through its configuration file. You can adjust settings such as themes, routes, and features to better suit your needs.');
        return view('docs.customization.config');
    })->name('customization.config');



     /**----------------
     * Digging deeper
     */

     Route::get('/embedding', function () {
        Helper::seo('Embedding','WireChat is designed with simplicity and flexibility in mind. Not only can you use the default <livewire:chats/> widget to embed a chat interface on any page of your application, but you can also integrate it into custom layouts.');

        return view('docs.digging-deeper.embedding');
    })->name('customization.embedding');


    Route::get('/core-components', function () {
        Helper::seo('Core-components','Here  is an overview table of WireChat’s Livewire components');

        return view('docs.digging-deeper.core-components');
    })->name('customization.core-components');


     /**----------------
     * More
     */


     Route::get('/contribution', function () {
        Helper::seo('Contribution Guide',"Thanks for contributing to Wirechat! We're excited to have you help improve the project. Here's how to get started");
        return view('docs.more.contribution');
    })->name('more.contribution');


});
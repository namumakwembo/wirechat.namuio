<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::prefix('docs')->group(function () {
    Route::get('/', function () {
        return view('docs.introduction');
    })->name('docs');


    Route::get('/installation', function () {
        return view('docs.installation');
    })->name('installation');





    /**----------------
     * Usage
     */

     Route::get('/overview', function () {
        return view('docs.usage.overview');
    })->name('usage.overview');


    Route::get('/aggregations', function () {
        return view('docs.usage.aggregations');
    })->name('usage.aggregations');

    Route::get('/groups', function () {
        return view('docs.usage.groups');
    })->name('usage.groups');

     
    /**----------------
     * Customization
     */


    Route::get('/trait', function () {
        return view('docs.customization.trait');
    })->name('customization.trait');

    Route::get('/config', function () {
        return view('docs.customization.config');
    })->name('customization.config');

    // Add more routes here as needed
});
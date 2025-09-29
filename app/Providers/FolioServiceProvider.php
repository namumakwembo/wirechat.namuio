<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Folio\Folio;

class FolioServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Folio::path(resource_path('views/pages'))->middleware([
            '*' => [
                //
            ],
        ]);

        /**--------------
         * Latest version
         * ---------------
         */
//       Folio::path(resource_path('views/docs/0.3x'))->uri('/docs');
//
//        /*0.2x*/
//        Folio::path(resource_path('views/docs/0.2x'))->uri('/docs/0.2x');
//

    }
}

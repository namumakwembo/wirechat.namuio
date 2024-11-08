<?php

namespace App\Helpers;

use Artesaos\SEOTools\Facades\SEOTools;

class Helper {





  static public function seo(string $title,string $description=null,string $url=null)  {

    SEOTools::setTitle($title);
    SEOTools::setDescription($description);
    SEOTools::opengraph()->setUrl($url?$url:url()->current());
    SEOTools::setCanonical($url?$url:url()->current());
    SEOTools::opengraph()->addProperty('type', 'articles');
    SEOTools::jsonLd()->addImage(asset('assets/wirechat-preview.png'));
        
    }


}
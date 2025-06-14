<?php

use Illuminate\Support\Facades\URL;


  if(! function_exists('default_image')){
    function default_image(){
      return URL::asset('public/admin/images/gloabal/default.webp');
    }
  }

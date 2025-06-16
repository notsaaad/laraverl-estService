<?php

use Illuminate\Support\Facades\URL;


  if(! function_exists('default_image')){
    function default_image(){
      return URL::asset('public/admin/images/gloabal/default.webp');
    }
  }
  if(! function_exists('default_category_image')){
    function default_category_image(){
      return URL::asset('public/admin/images/gloabal/defaultcategory.png');
    }
  }
  if(! function_exists('default_service_image')){
    function default_service_image(){
      return URL::asset('public/admin/images/gloabal/defaultcategory.png');
    }
  }



  // ==================== Start For Upload Any Image =======================

if (! function_exists('uploadImage')){
  function uploadImage($file, $path = 'public/images'){
    if (!$file || !$file->isValid()) {
      return null;
    }
    $ext = $file->getClientOriginalExtension();
    $file_name = time() . '_' . uniqid() . '.' . $ext;
    $file->move($path, $file_name);
    return $file_name;
  }
}
// ==================== End For Upload Any Image ========================





// ==================== Start Delete Image =======================

if (! function_exists('DeleteImage')){
  function DeleteImage($path){
    unlink(public_path($path));
  }
}
// ==================== End Delete Image ========================


if (! function_exists('UsersImagePath')){
  function UsersImagePath(){
    return "public/admin/images/users/";
  }
}
if (! function_exists('CategoriesImagePath')){
  function CategoriesImagePath(){
    return "public/admin/images/categories/";
  }
}
if (! function_exists('ServiceImagePath')){
  function ServiceImagePath(){
    return "public/admin/images/services/";
  }
}

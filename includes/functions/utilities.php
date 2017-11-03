<?php

function get_siteurl(){
    return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}


function get_currenturl(){
    return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}

function get_thumbnail_lang($category, $lang){
  //var_dump($category);
  if (isset($lang) && !empty($lang) && $lang != Application::this()->default_language){
    if (isset($category['thumbnail_'.$lang]) && !empty($category['thumbnail_'.$lang])){
      return $category['thumbnail_'.$lang];
    }
    else if (isset($category['thumbnail']) && !empty($category['thumbnail'])){
      return $category['thumbnail'];
    }
    else {
      return null;
    }
  }
  else {
    if (isset($category['thumbnail']) && !empty($category['thumbnail'])){
      return $category['thumbnail'];
    }
    else {
      return null;
    }
  }
}

 ?>

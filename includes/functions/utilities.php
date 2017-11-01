<?php

function get_siteurl(){
    return "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
}


 ?>

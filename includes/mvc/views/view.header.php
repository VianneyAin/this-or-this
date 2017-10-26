<?php
  class Header_View {

      function fn_header_view(){
        $lang = Application::this()->current_lang;
        if ($lang == Application::this()->default_language){
          $lang = '';
        }
           ?>
          <!DOCTYPE html>
          <html lang="en">
          <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
            <title>This or this</title>

            <!-- CSS  -->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link href="<?php echo 'http://localhost/this-or-this/css/materialize.css' ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
            <link href="<?php echo 'http://localhost/this-or-this/css/style.css' ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
            <link href="<?php echo 'http://localhost/this-or-this/css/custom.css' ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
            <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script src="<?php echo 'http://localhost/this-or-this/js/materialize.js' ?>"></script>
            <script src="<?php echo 'http://localhost/this-or-this/js/init.js' ?>"></script>
            <script src="<?php echo 'http://localhost/this-or-this/js/validate.js' ?>"></script>
          </head>
          <body>
            <nav id="main-menu" class="teal lighten-2" role="navigation">
              <div class="nav-wrapper container">
                <a id="logo-container" href="http://localhost/this-or-this/<?php echo $lang; ?>" class="brand-logo">
                  <img src="http://localhost/this-or-this/img/logo_white.svg" height='65px; '/>
                </a>
                <ul class="right hide-on-med-and-down">
                    <li><a href="http://localhost/this-or-this/<?php _t('tot');?>/"><?php _t('Choose a category'); ?></a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><?php _t('Languages'); ?><i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
                <ul id="dropdown1" class="dropdown-content">
                  <li><a href="http://localhost/this-or-this/fr"><?php _t('French'); ?></a></li>
                  <li><a href="http://localhost/this-or-this/"><?php _t('English'); ?></a></li>
                  <li><a href="http://localhost/this-or-this/de"><?php _t('German'); ?></a></li>
                  <li><a href="http://localhost/this-or-this/es"><?php _t('Spanish'); ?></a></li>
                  <li><a href="http://localhost/this-or-this/pt"><?php _t('Portuguese'); ?></a></li>
                </ul>
                <!--CATEGORIES SIDEBAR -->
                <ul id="cat-sidebar" class="side-nav" style="z-index:999">
                    <li><a href="http://localhost/this-or-this/tot/"><i class="material-icons">format_list_bulleted</i>Choose a category</a></li>
                </ul>
                <!-- END OF CATEGORIES SIDEBAR -->

                <ul id="nav-mobile" class="side-nav">
                    <li><a href="http://localhost/this-or-this/tot/"><i class="material-icons">format_list_bulleted</i>Choose a category</a></li>


                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse right"><i class="material-icons">menu</i></a>
              </div>
            </nav>
        <?php

      }
  }
?>

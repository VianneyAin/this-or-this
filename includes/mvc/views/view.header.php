<?php
  class Header_View {
      function call_to_actions($actions){
          foreach($actions as $location => $actions_array){
              if ($location == 'header'){
                  foreach ($actions_array as $key => $action){
                       Application::{$action}();
                  }
              }
          }
      }
      function display_meta($meta, $lang, $default_language){
        if (empty($lang) && !empty($default_language)){
          $lang = $default_language;
        }
        ?>
          <!-- http meta -->
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
          <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
          <meta http-equiv="content-language" content="en">
          <meta name="author" content="This or This Company" />
          <meta name="publisher" content="This or This Company">
          <meta name="copyright" content="This or This Company" />
          <!-- end of http meta -->

          <!-- robots meta -->
          <meta name="robots" content="index,follow" />
          <meta name="revisit-after" content="10 days">
          <meta name="revisit" content="after 10 days">
          <!-- end of robots meta -->

          <meta http-equiv="Content-Language" content="fr-CA" />
          <meta http-equiv="Cache-Control" content="max-age=600" />
          <meta http-equiv="Expires" content="<?php echo date(DATE_RFC822,strtotime("3 day")); ?>" />

          <?php
          if (isset($lang) && !empty($lang)){
            if (isset($meta[$lang]) && !empty($meta[$lang])){
              ?>
              <title><?php echo $meta[$lang]['title']; ?></title>
              <!-- General Meta -->
              <meta name="title" content="<?php echo $meta[$lang]['title']; ?>">
              <meta name="description" content="<?php echo $meta[$lang]['description']; ?>">

              <!-- Facebook Meta -->
              <meta property="og:title" content="<?php echo $meta[$lang]['title']; ?>"/>
              <meta property="og:image" content="https://localhost/this-or-this/<?php echo $meta[$lang]['image']; ?>"/>
              <meta property="og:site_name" content="This or This"/>
              <meta property="og:description" content="<?php echo $meta[$lang]['description']; ?>"/>
              <meta property="og:locale" content="<?php echo $meta[$lang]['code']; ?>" />
              <meta property="og:type" content="website" />
              <meta property="og:url" content="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" />
              <!-- End of Facebook Meta tag -->

              <!-- Twitter Meta tag -->
              <meta name="twitter:card" content="summary" />
              <meta name="twitter:site" content="@thisorthis" />
              <meta name="twitter:creator" content="@thisorthis" />
              <meta name="twitter:title" content="<?php echo $meta[$lang]['title']; ?>" />
              <meta name="twitter:description" content="<?php echo $meta[$lang]['description']; ?>" />
              <meta name="twitter:image" content="https://localhost/this-or-this/<?php echo $meta[$lang]['image']; ?>" />
              <!-- End of Twitter Meta tag -->
              <?php
            }
          }
      }

      function fn_header_view($actions, $meta){
        $lang = Application::this()->current_lang;
        if ($lang == Application::this()->default_language){
          $lang = '';
        }
           ?>
          <!DOCTYPE html>
          <html lang="en">
          <head>
            <?php $this->display_meta($meta, Application::this()->current_lang, Application::this()->default_language); ?>

            <!-- Favicons -->
            <link rel="apple-touch-icon" sizes="180x180" href="https://localhost/this-or-this/img/favicon/apple-touch-icon.png">
            <link rel="icon" type="image/png" sizes="32x32" href="https://localhost/this-or-this/img/favicon/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="16x16" href="https://localhost/this-or-this/img/favicon/favicon-16x16.png">
            <link rel="manifest" href="https://localhost/this-or-this/img/favicon/manifest.json">
            <link rel="mask-icon" href="https://localhost/this-or-this/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
            <meta name="theme-color" content="#ffffff">
            <!-- End of Favicons -->

            <?php $this->call_to_actions($actions); ?>

            <!-- CSS  -->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link href="<?php echo 'https://localhost/this-or-this/css/materialize.css' ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
            <link href="<?php echo 'https://localhost/this-or-this/css/style.css' ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
            <link href="<?php echo 'https://localhost/this-or-this/css/custom.css' ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
            <link href="<?php echo 'https://localhost/this-or-this/css/font-awesome.min.css' ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
            <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script src="<?php echo 'https://localhost/this-or-this/js/materialize.js' ?>"></script>
            <script src="<?php echo 'https://localhost/this-or-this/js/init.js' ?>"></script>
            <script src="<?php echo 'https://localhost/this-or-this/js/validate.js' ?>"></script>
            <script src="<?php echo 'https://localhost/this-or-this/js/js.cookie.js' ?>"></script>
            <script src="<?php echo 'https://localhost/this-or-this/js/jquery.elevateZoom-3.0.8.min.js' ?>"></script>

            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108698505-1"></script>
            <script>
              window.dataLayer = window.dataLayer || [];
              function gtag(){dataLayer.push(arguments);}
              gtag('js', new Date());

              gtag('config', 'UA-108698505-1');
            </script>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <script>
              (adsbygoogle = window.adsbygoogle || []).push({
                google_ad_client: "ca-pub-8721154197374288",
                enable_page_level_ads: true
              });
            </script>

            <script>window.twttr = (function(d, s, id) {
              var js, fjs = d.getElementsByTagName(s)[0],
                t = window.twttr || {};
              if (d.getElementById(id)) return t;
              js = d.createElement(s);
              js.id = id;
              js.src = "https://platform.twitter.com/widgets.js";
              fjs.parentNode.insertBefore(js, fjs);

              t._e = [];
              t.ready = function(f) {
                t._e.push(f);
              };

              return t;
            }(document, "script", "twitter-wjs"));</script>

          </head>
          <body>
              <div id="fb-root"></div>
              <script>(function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.10&appId=1560869377534668';
                fjs.parentNode.insertBefore(js, fjs);
              }(document, 'script', 'facebook-jssdk'));</script>
            <nav id="main-menu" class="cyan darken-3" role="navigation">
              <div class="nav-wrapper container">
                <a id="logo-container" href="https://localhost/this-or-this/<?php echo $lang; ?>" class="brand-logo">
                  <img src="https://localhost/this-or-this/img/logo_white.svg" height='65px' width="100px"/>
                </a>
                <ul class="right hide-on-med-and-down">
                    <li><a class="dropdown-button" href="#!" data-activates="mode_dropdown"><?php _t('Choose a mode'); ?><i class="material-icons right">arrow_drop_down</i></a></li>
                    <li><a href="https://<?php _t('localhost/this-or-this');?>/tot/"><?php _t('Choose a category'); ?></a></li>
                    <li><a class="dropdown-button" href="#!" data-activates="lang_dropdown"><?php _t('Languages'); ?><i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
                <ul id="mode_dropdown" class="dropdown-content">
                  <li><a href="https://<?php _t('localhost/this-or-this');?>/tot/"><?php _t('Classic Mode'); ?></a></li>
                  <li><a href="https://<?php _t('localhost/this-or-this');?>/infinite/"><?php _t('Infinite Mode'); ?></a></li>
                  <li><a href="https://<?php _t('localhost/this-or-this');?>/challenge/"><?php _t('Challenge Mode'); ?></a></li>
                </ul>
                <ul id="lang_dropdown" class="dropdown-content">
                  <li><a href="<?php echo _tlink(get_currenturl(), 'fr'); ?>"><?php _t('French'); ?></a></li>
                  <li><a href="<?php echo _tlink(get_currenturl(), ''); ?>"><?php _t('English'); ?></a></li>
                  <li><a href="<?php echo _tlink(get_currenturl(), 'de'); ?>"><?php _t('German'); ?></a></li>
                  <li><a href="<?php echo _tlink(get_currenturl(), 'es'); ?>"><?php _t('Spanish'); ?></a></li>
                  <li><a href="<?php echo _tlink(get_currenturl(), 'pt'); ?>"><?php _t('Portuguese'); ?></a></li>
                </ul>
                <ul id="lang_dropdown_mobile" class="dropdown-content">
                  <li><a href="<?php echo _tlink(get_currenturl(), 'fr'); ?>"><?php _t('French'); ?></a></li>
                  <li><a href="<?php echo _tlink(get_currenturl(), ''); ?>"><?php _t('English'); ?></a></li>
                  <li><a href="<?php echo _tlink(get_currenturl(), 'de'); ?>"><?php _t('German'); ?></a></li>
                  <li><a href="<?php echo _tlink(get_currenturl(), 'es'); ?>"><?php _t('Spanish'); ?></a></li>
                  <li><a href="<?php echo _tlink(get_currenturl(), 'pt'); ?>"><?php _t('Portuguese'); ?></a></li>
                </ul>
                <ul id="nav-mobile" class="side-nav">

                    <li class="cyan darken-3"><a class="dropdown-button white-text" href="#!" data-activates="lang_dropdown_mobile"><i class="material-icons white-text">language</i><?php _t('Languages'); ?><i class="material-icons right white-text">arrow_drop_down</i></a></li>
                    <li><a href="https://<?php _t('localhost/this-or-this');?>"><i class="material-icons">home</i><?php _t('Home'); ?></a></li>
                    <li><a href="https://<?php _t('localhost/this-or-this');?>/tot/"><i class="material-icons">format_list_bulleted</i><?php _t('Choose a category'); ?></a></li>
                    <li><a href="https://<?php _t('localhost/this-or-this');?>/infinite/"><i class="material-icons">loop</i><?php _t('Infinite Mode'); ?></a></li>
                    <li><a href="https://<?php _t('localhost/this-or-this');?>/challenge/"><i class="material-icons">loop</i><?php _t('Challenge Mode'); ?></a></li>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse right"><i class="material-icons">menu</i></a>
              </div>
            </nav>
        <?php

      }
  }
?>

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
      function fn_header_view($registration, $actions, $categories){
           ?>
          <!DOCTYPE html>
          <html lang="en">
          <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
            <title>Jokes</title>

            <!-- CSS  -->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link href="<?php echo 'http://localhost/jokes/css/materialize.css' ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
            <link href="<?php echo 'http://localhost/jokes/css/style.css' ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
            <link href="<?php echo 'http://localhost/jokes/css/custom.css' ?>" type="text/css" rel="stylesheet" media="screen,projection"/>
            <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
            <script src="<?php echo 'http://localhost/jokes/js/materialize.js' ?>"></script>
            <script src="<?php echo 'http://localhost/jokes/js/init.js' ?>"></script>
            <script src="<?php echo 'http://localhost/jokes/js/validate.js' ?>"></script>
            <?php $this->call_to_actions($actions); ?>
          </head>
          <body>
            <nav id="main-menu" class="light-blue darken-2" role="navigation">
              <div class="nav-wrapper container"><a id="logo-container" href="http://localhost/jokes" class="brand-logo">[...]</a>
                <ul class="right hide-on-med-and-down">
                    <?php if (isset($categories) && !empty($categories) && sizeof($categories) > 0){ ?>
                        <li><a id="cat-button" data-activates="cat-sidebar" class="show-on-large">Catégories</a></li>
                    <?php } ?>
                    <?php if ($registration->CheckLogin()){
                        echo '<li><a href="http://localhost/jokes/profil" type="submit">Profil</a></li>';
                        echo '<li><a href="http://localhost/jokes/logout" type="submit">Déconnexion</a></li>';
                    } else { ?>
                        <li><a href="http://localhost/jokes/connexion">Connexion</a></li>
                    <?php } ?>
                </ul>

                <!--CATEGORIES SIDEBAR -->
                <ul id="cat-sidebar" class="side-nav" style="z-index:999">
                    <li><a><i class="material-icons">format_list_bulleted</i>Liste des catégories</a></li>
                    <?php foreach ($categories as $key => $category){
                        echo '<li><a href="http://localhost/jokes/blagues/cat/'.$category['slug'].'">'.$category['name'].'</a></li>';
                    }
                    ?>
                </ul>
                <!-- END OF CATEGORIES SIDEBAR -->

                <ul id="nav-mobile" class="side-nav">
                    <?php if ($registration->CheckLogin()){
                        echo '<li><a href="http://localhost/jokes/profil" type="submit">Profil</a></li>';
                        echo '<li><a href="http://localhost/jokes/logout" type="submit">Déconnexion</a></li>';
                    } else { ?>
                        <li><a href="http://localhost/jokes/connexion">Connexion</a></li>
                    <?php } ?>
                    <?php /*if ( isset($categories) && !empty($categories) && sizeof($categories) > 0 ){ ?>
                        <ul class="collapsible collapsible-accordion">
                          <li>
                            <a class="collapsible-header">Catégories<i class="material-icons">arrow_drop_down</i></a>
                            <div class="collapsible-body">
                              <ul>
                                  <?php foreach ($categories as $key => $category){
                                      if (isset($category['name']) && !empty($category['name'])){
                                          echo '<li><a href="http://localhost/jokes/blagues/cat/'.$category['slug'].'">'.$category['name'].'</a></li>';
                                      }
                                  }
                                  ?>
                              </ul>
                            </div>
                          </li>
                        </ul>
                    <?php } */?>

                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse right"><i class="material-icons">menu</i></a>
              </div>
            </nav>
        <?php

      }
  }
?>

<?php
  class Header_View {
      function fn_header_view(){
          require_once(dirname(__FILE__)."/../../functions/membersite_config.php");
           ?>
          <!DOCTYPE html>
          <html lang="en">
          <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
            <title>Jokes</title>

            <!-- CSS  -->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
            <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
            <link href="custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>
          </head>
          <body>
            <nav class="amber darken-1" role="navigation">
              <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">Blagues</a>
                <ul class="right hide-on-med-and-down">
                    <?php if ($registration->CheckLogin()){
                        echo '<li><a href="profil.php" type="submit">Profil</a></li>';
                        echo '<li><a href="logout.php" type="submit">Déconnexion</a></li>';
                    } else { ?>
                        <li><a href="connexion.php">Connexion</a></li>
                    <?php } ?>

                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <?php if ($registration->CheckLogin()){
                        echo '<li><a href="profil.php" type="submit">Profil</a></li>';
                        echo '<li><a href="logout.php" type="submit">Déconnexion</a></li>';
                    } else { ?>
                        <li><a href="connexion.php">Connexion</a></li>
                    <?php } ?>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
              </div>
            </nav>
        <?php

      }
  }
?>

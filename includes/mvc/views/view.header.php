<?php
  class Header_View {
      function fn_header_view($registration){
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
            <link href="css/custom.css" type="text/css" rel="stylesheet" media="screen,projection"/>
            <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
          </head>
          <body>
            <nav id="main-menu" class="amber darken-1" role="navigation">
              <div class="nav-wrapper container"><a id="logo-container" href="http://localhost/jokes" class="brand-logo">Autonum</a>
                <ul class="right hide-on-med-and-down">
                    <?php if ($registration->CheckLogin()){
                        echo '<li><a href="http://localhost/jokes/profil" type="submit">Profil</a></li>';
                        echo '<li><a href="http://localhost/jokes/logout" type="submit">Déconnexion</a></li>';
                    } else { ?>
                        <li><a href="http://localhost/jokes/connexion">Connexion</a></li>
                    <?php } ?>

                </ul>

                <ul id="nav-mobile" class="side-nav">
                    <?php if ($registration->CheckLogin()){
                        echo '<li><a href="http://localhost/jokes/profil" type="submit">Profil</a></li>';
                        echo '<li><a href="http://localhost/jokes/logout" type="submit">Déconnexion</a></li>';
                    } else { ?>
                        <li><a href="http://localhost/jokes/connexion">Connexion</a></li>
                    <?php } ?>
                </ul>
                <a href="#" data-activates="nav-mobile" class="button-collapse right"><i class="material-icons">menu</i></a>
              </div>
            </nav>
        <?php

      }
  }
?>
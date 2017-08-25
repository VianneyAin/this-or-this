<?php
  class Error_View {
      public function fn_error_view(){
          ?>
          <div class="section no-pad-bot" id="index-banner">
            <div class="container">
              <br><br>
              <h1 class="header center orange-text">WOOPS</h1>
              <div class="row center">
                <h5 class="header col s12 light">Il semblerait que vous soyez perdu !</h5>
              </div>
              <div class="row center">
                <a href="http://localhost/jokes" id="download-button" class="btn-large waves-effect waves-light orange">
                    Retour à l'accueil
                </a>
              </div>
              <br><br>

            </div>
          </div>

          <?php
      }
  }
?>

<?php
  class Home_View {
      private $user_object;

      function __construct($user_object){
          $this->user_object = $user_object;
      }

      function fn_home_view(){
          ?>
            <div class="section no-pad-bot" id="index-banner">
              <div class="container">
                <br><br>
                <h1 class="header center light-blue-text">[...]</h1>
                <div class="row center">
                  <h5 class="header col s12 light">THIS ... OR THIS ?</h5>
                </div>
                <div class="row center">
                  <a href="http://localhost/this-or-this/tot/" id="download-button" class="btn-large waves-effect waves-light light-blue darken-2">
                      Select a topic
                  </a>
                </div>
                <br><br>

              </div>
            </div>

        <?php
      }
  }
?>

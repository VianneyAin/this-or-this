<?php
  class Error_View {
      public function fn_error_view(){
          ?>
          <div class="section no-pad-bot" id="index-banner">
            <div class="container">
              <br><br>
              <h1 class="header center cyan-text">WOOPS</h1>
              <div class="row center">
                <h5 class="header col s12 light"><?php _t('You seem to be lost'); ?></h5>
              </div>
              <div class="row center">
                <a href="http://localhost/this-or-this" id="download-button" class="btn-large waves-effect waves-light cyan darken-3">
                    <?php _t('Back to homepage'); ?>
                </a>
              </div>
              <br><br>

            </div>
          </div>

          <?php
      }
  }
?>

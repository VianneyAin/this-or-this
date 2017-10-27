<?php
  class About_View {
      public function fn_about_view(){
          ?>
          <div id="index-banner" >
            <div class="section no-pad-bot">
              <div class="container">
                <br><br>
                <div class="row center">
                  <img src="img/logo_blue.svg" height='150px; '/>
                </div>
                <div class="row center">
                  <h1 class="header col s12 black-text light"><?php _t("What is"); ?> This or This?</h1>
                </div>
                <br><br>
              </div>
            </div>
          </div>
          <div class="container">
              <div class="section">
                  <div class="row">
                    <h3 class="col s12 light shadow-5"><?php _t('An idea'); ?></h3>
                  </div>
                  <div class="row">
                      <p><b>This or This</b> <?php _t('is born from a pretty dumb idea, the simple fact to recognize a picture, just by seing a part of it.'); ?></p>
                      <p><?php _t('On social medias, this idea has been used by some pages, by it was very poorly handled, or not good enough to be attractive.'); ?></p>
                      <p><?php _t('Very fast, our team got the idea to use two themes that we can relate to each other, and which are difficult to differentiate with only a part of the picture. We finally made <b>This or This</b>, the website on which you are at this moment.'); ?></p>
                  </div>
              </div>
          </div>
          <div class="container">
              <div class="section">
                  <div class="row">
                    <h3 class="col s12 light shadow-5"><?php _t('The futur'); ?></h3>
                  </div>
                  <div class="row">
                      <p><?php _t('For now, the <b>This of This</b> team is working on the creation of new categories, and is dealing with bug fixes all over the website.'); ?></p>
                      <p><?php _t('In the future, many features will be implemented, but it is still necessary that the concept works. For that, nothing more simple, you just need to share a maximum This or This with your friends on the social networks.'); ?></p>
                      <p><?php _t('If you have a theme idea for a future category, or a new concept to propose, you can tell us via the form provided for this purpose, or via our social networks.'); ?></p>
                  </div>
              </div>
          </div>
          <?php
      }
  }
?>

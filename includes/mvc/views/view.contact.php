<?php
  class Contact_View {
      public function fn_contact_view($response){
        var_dump($response);
          ?>
          <div id="index-banner" >
            <div class="section no-pad-bot">
              <div class="container">
                <br><br>
                <div class="row center">
                  <img src="http://localhost/this-or-this/img/logo_blue.svg" height='150px; '/>
                </div>
                <div class="row center">
                  <h1 class="header col s12 black-text light"><?php _t("Contact"); ?></h1>
                </div>
                <br><br>
              </div>
            </div>
          </div>
          <div class="container">
              <div class="section">
                  <div class="row">
                    <h4 class="col s12 light shadow-5"><?php _t('An idea to share or just a need to contact us, it is right here.'); ?></h4>
                  </div>
              </div>
          </div>
          <div class="container">
              <div class="section">
                  <div class="row">
                    <form class="col s12" method='post' accept-charset='UTF-8'>
                      <div class="row">
                        <div class="input-field col s12">
                          <input id="email" type="email" class="validate" name="email">
                          <label for="email" data-error="<?php _t('Please enter a valid email'); ?>" data-success="">Email</label>
                        </div>
                      </div>
                      <div class="row">
                          <div class="input-field col s12">
                            <textarea id="message_area" class="materialize-textarea" name="message"></textarea>
                            <label for="message_area">Message</label>
                          </div>
                      </div>
                      <input style="display:none"; type="text" name="contact" value="true" />
                      <?php if (isset($response) && !empty($response)){
                        if (isset($response['success']) && !empty($response['success']) && isset($response['message']) && !empty($response['message'])){
                          if ($response['success'] == true){
                            ?>
                            <div class="row centered">
                              <div class="col s12 centered success">
                                  <p class="centered"><?php echo $response['message']; ?></p>
                              </div>
                            </div>
                            <?php
                          }
                          else {
                            ?>
                            <div class="row centered">
                              <div class="col s12 centered error">
                                  <p class="centered"><?php echo $response['message']; ?></p>
                              </div>
                            </div>
                            <?php
                          }
                        }
                      }?>
                      <div class="row right-align">
                          <button class="btn waves-effect waves-light" type="submit" name="submit"><?php _t('Send'); ?>
                           <i class="material-icons right">send</i>
                         </button>
                      </div>
                    </form>
                  </div>
              </div>
          </div>
          <?php
      }
  }
?>

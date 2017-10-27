<?php
  class Footer_View {
      public function call_to_actions($actions){
          foreach($actions as $location => $actions_array){
              if ($location == 'footer'){
                  foreach ($actions_array as $key => $action){
                       Application::{$action}();
                  }
              }
          }
      }

      public function fn_footer_view($actions, $datas){
          ?>
          <footer class="page-footer cyan darken-1">
            <div class="container">
              <div class="row">
                <div class="col l6 s12">
                  <h5 class="grey-text text-lighten-4"><?php _t('About'); ?></h5>
                  <ul>
                      <li><a class="white-text text-lighten-1" href="">What is <b>This or This ?</a></li>
                      <li><a class="white-text text-lighten-1" href="">Want to be part of it ?</a></li>
                  </ul>
                </div>
                <div class="col l3 s12">
                  <h5 class="white-text text-lighten-4"><?php _t('Latest Categories'); ?></h5>
                  <ul>
                      <?php
                      if (isset($datas) && !empty($datas) && isset($datas['categories']) && !empty($datas['categories'])){
                          foreach ($datas['categories'] as $key => $category){
                              echo '<li><a class="white-text text-lighten-1" href="http://localhost/this-or-this/tot/'.$category['slug'].'">'.__t($category['title']).'</a></li>';
                          }
                      }
                      ?>
                  </ul>
                </div>
                <div class="col l3 s12">
                  <h5 class="white-text text-lighten-4"><?php _t('Any idea ?'); ?></h5>
                  <ul>
                    <li><a class="white-text text-lighten-1" href="http://localhost/this-or-this/"><?php _t('Share it with us'); ?> !</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="footer-copyright cyan darken-3">
              <div class="container">
              <?php _t('All rights reserved'); ?> ©ThisOrThis.
              </div>
            </div>
          </footer>


          <!--  Scripts-->
          <?php $this->call_to_actions($actions); ?>
          <script src="<?php echo 'http://localhost/this-or-this/js/rating.js' ?>"></script>
          <script src="<?php echo 'http://localhost/this-or-this/js/global.js' ?>"></script>
          </body>
          </html>

          <?php
      }
  }
?>

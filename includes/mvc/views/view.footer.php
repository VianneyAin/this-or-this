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
                <div class="col m3 s12">
                  <h5 class="grey-text text-lighten-4"><?php _t('About'); ?></h5>
                  <ul>
                      <li><a class="white-text text-lighten-1" href="https://localhost/this-or-this<?php _t('/about'); ?>"><?php _t('What is');?> <b>This or This</b> ?</a></li>
                      <!--<li><a class="white-text text-lighten-1" href=""><?php _t('Want to be part of it ?');?></a></li>-->
                  </ul>
                </div>
                <div class="col m3 s12">
                  <h5 class="white-text text-lighten-4"><?php _t('Most Popular Categories'); ?></h5>
                  <ul>
                      <?php
                      if (isset($datas) && !empty($datas) && isset($datas['categories']) && !empty($datas['categories']) && isset($datas['categories']['popular']) && !empty($datas['categories']['popular'])){
                          foreach ($datas['categories']['popular'] as $key => $category){
                              echo '<li><a class="white-text text-lighten-1" href="http://'.__t('localhost/this-or-this').'/tot/'.$category['slug'].'">'.__t($category['title']).'</a></li>';
                          }
                      }
                      ?>
                  </ul>
                </div>
                <div class="col m3 s12">
                  <h5 class="white-text text-lighten-4"><?php _t('Latest Categories'); ?></h5>
                  <ul>
                      <?php
                      if (isset($datas) && !empty($datas) && isset($datas['categories']) && !empty($datas['categories']) && isset($datas['categories']['latest']) && !empty($datas['categories']['latest'])){
                          foreach ($datas['categories']['latest'] as $key => $category){
                              echo '<li><a class="white-text text-lighten-1" href="http://'.__t('localhost/this-or-this').'/tot/'.$category['slug'].'">'.__t($category['title']).'</a></li>';
                          }
                      }
                      ?>
                  </ul>
                </div>
                <div class="col m3 s12">
                  <h5 class="white-text text-lighten-4"><?php _t('Any idea ?'); ?></h5>
                  <ul>
                    <li><a class="white-text text-lighten-1" href="http:///<?php _t('localhost/this-or-this');?>/contact"><?php _t('Share it with us'); ?> !</a></li>
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
          <script src="<?php echo 'https://localhost/this-or-this/js/rating.js' ?>"></script>
          <script src="<?php echo 'https://localhost/this-or-this/js/global.js' ?>"></script>

          <?php
          $lang = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
          $lang_name = _l($lang);
          /*if ($lang != Application::this()->current_lang){
          ?>
            <div id="lang_modal" class="modal">
              <div class="modal-content centered">
                <h5><?php _tl('Detected language : ', $lang); echo $lang_name; ?></h5>
                <a href="<?php echo _tlink(get_currenturl(), $lang); ?>" class="waves-effect waves-light btn go-to-lang"><?php _tl('go to my language', $lang); ?></a>
                <a class="waves-effect waves-light btn modal-action modal-close modal-close-lang"><?php _tl('no thanks', $lang); ?></a>
              </div>
              <div class="modal-footer">
                <a class="modal-action modal-close waves-effect waves-green btn-flat modal-close-lang">Close</a>
              </div>
            </div>

            <script type="text/javascript">
              jQuery(document).ready(function(){
                  if (Cookies.get('lang_modal')){
                    if (Cookies.get('lang_modal') == 'true'){
                      $('#lang_modal').modal('open');
                    }
                  }
                  else {
                    $('#lang_modal').modal('open');
                  }
                  jQuery('.modal-close-lang').click(function(){
                    Cookies.set('lang_modal', 'false', { expires: 2 });
                  });
                  jQuery('.go-to-lang').click(function(){
                    Cookies.set('lang_modal', 'true', { expires: 2 });
                  });
              });
            </script>
          <?php }*/ ?>

          </body>
          </html>

          <?php
      }
  }
?>

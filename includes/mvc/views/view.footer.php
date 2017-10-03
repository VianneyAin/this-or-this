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
          <footer class="page-footer light-blue lighten-1">
            <div class="container">
              <div class="row">
                <div class="col l6 s12">
                  <h5 class="white-text">About</h5>
                  <p class="grey-text text-lighten-4">You just have to choose a topic, and have fun wondering what is what. Enjoy !</p>
                </div>
                <div class="col l3 s12">
                  <h5 class="white-text">Last categories</h5>
                  <ul>
                      <?php
                      if (isset($datas) && !empty($datas) && isset($datas['categories']) && !empty($datas['categories'])){
                          foreach ($datas['categories'] as $key => $category){
                              echo '<li><a class="white-text" href="http://localhost/this-or-this/tot/'.$category['slug'].'">'.$category['title'].'</a></li>';
                          }
                      }
                      ?>
                  </ul>
                </div>
                <div class="col l3 s12">
                  <h5 class="white-text">You have an idea of topic ?</h5>
                  <ul>
                    <li><a class="white-text" href="http://localhost/this-or-this/">Share it with us !</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="footer-copyright">
              <div class="container">
              Made by <a class="orange-text text-lighten-3" href="http://vianneyain.com">Vianney Aïn</a>.
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

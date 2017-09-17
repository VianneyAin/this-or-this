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

      public function fn_footer_view($actions){
          ?>
          <footer class="page-footer light-blue lighten-1">
            <div class="container">
              <div class="row">
                <div class="col l6 s12">
                  <h5 class="white-text">A Propos de [...]</h5>
                  <p class="grey-text text-lighten-4">[...] est un site collaboratif de blague. Toute personne disposant d'une connexion internet, que ce soit sur son téléphone, sa tablette ou son pc, peut y poster ses blagues, en ajouter certaines à ses favoris, les partagers avec ses amis, et tout ça, 100% gratuitement.</p>
                </div>
                <div class="col l3 s12">
                  <h5 class="white-text">Settings</h5>
                  <ul>
                    <li><a class="white-text" href="#!">TODO</a></li>
                    <li><a class="white-text" href="#!">TODO</a></li>
                    <li><a class="white-text" href="#!">TODO</a></li>
                    <li><a class="white-text" href="#!">TODO</a></li>
                  </ul>
                </div>
                <div class="col l3 s12">
                  <h5 class="white-text">Connect</h5>
                  <ul>
                    <li><a class="white-text" href="http://localhost/jokes/version">Version du site</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="footer-copyright">
              <div class="container">
              Made by <a class="orange-text text-lighten-3" href="http://vianneyain.com">Vianney Aïn</a> with <a target="_blank" class="orange-text text-lighten-3" href="http://materializecss.com/">Materialize</a>.
              </div>
            </div>
          </footer>


          <!--  Scripts-->
          <?php $this->call_to_actions($actions); ?>
          <script src="<?php echo 'http://localhost/jokes/js/rating.js' ?>"></script>
          <script src="<?php echo 'http://localhost/jokes/js/global.js' ?>"></script>
          </body>
          </html>

          <?php
      }
  }
?>

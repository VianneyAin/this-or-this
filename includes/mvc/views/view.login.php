<?php
  class Login_View {
      function sign_in_view($registration){
          if(isset($_POST['submitted']))
          {
              if($registration->Login())
              {
                   $registration->RedirectToURL("http://localhost/jokes");
              }
          }
           ?>
            <div class="container">
                <div class="section">
                    <div class="row">
                      <form class="col m6 offset-m3 s12" action="connexion" method='post' accept-charset='UTF-8'>
                          <div class="row"><h4>Connectez-vous</h4></div>
                          <div class="row">
                            <div class="input-field col s12">
                              <input type='hidden' name='submitted' id='submitted' value='1'/>
                              <input id="username" type="text" class="validate" name="username" value="<?php echo $registration->SafeDisplay('username') ?>">
                              <label for="username">Nom d'utilisateur</label>
                            </div>
                          </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="password" type="password" class="validate" name="password" value="<?php echo $registration->SafeDisplay('password') ?>">
                            <label for="password">Mot de passe</label>
                          </div>
                        </div>
                        <div class="row right-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Connexion
                             <i class="material-icons right">send</i>
                           </button>
                        </div>
                        <?php if (!empty($registration->GetErrorMessage())){ ?>
                        <div class="row">
                            <div class="col s12 error">
                                <i class="material-icons">warning</i>
                                <?php echo $registration->GetErrorMessage(); ?>
                            </div>
                        </div>
                        <?php }?>
                      </form>
                    </div>
                    <div class="row right-align">
                        <div class="col m6 offset-m3 s12">
                            <a href="http://localhost/jokes/inscription">
                                <button class="btn-flat" name="action">
                                    Pas encore de compte ?
                               </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
      }
  }
?>

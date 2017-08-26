<?php
  class Signup_View {
      function sign_up_view($registration){
          if(isset($_POST['submitted']))
          {
             if($registration->RegisterUser())
             {
                  $success_message = 'Votre compte à bien été crée. Vous allez être redirigé dans quelques secondes.';
             }
          }
          ?>
            <div class="container">
                <div class="section">
                  <!--   Icon Section   -->
                  <div class="row center-align">
                      <button class="btn">Pourquoi s'inscrire ?</button>
                  </div>
                </div>
                <div class="section">
                    <div class="row">
                      <form class="col m6 offset-m3 s12" action="inscription" method='post' accept-charset='UTF-8'>
                          <div class="row"><h4>Formulaire d'inscription</h4></div>
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
                        <div class="row">
                          <div class="input-field col s12">
                            <input id="email" type="email" class="validate" name="email" value="<?php echo $registration->SafeDisplay('email') ?>">
                            <label for="email">Email</label>
                          </div>
                        </div>
                        <div class="row right-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Je m'inscris
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
                        <?php if (isset($success_message) && !empty($success_message)){ ?>
                        <div class="row">
                            <div class="col s12 success">
                                <i class="material-icons">check</i>
                                <?php echo $success_message; ?>
                            </div>
                        </div>
                        <script>
                            setTimeout(function () {
                               window.location.href= 'http://localhost/jokes/connexion?username=<?php echo $registration->SafeDisplay('username') ?>'; // the redirect goes here
                            },5000); // 5 seconds
                        </script>
                        <?php } ?>
                      </form>
                    </div>
                    <div class="row right-align">
                        <div class="col m6 offset-m3 s12">
                            <a href="http://localhost/jokes/connexion">
                                <button class="btn-flat" name="action">
                                    Déjà un compte ?
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

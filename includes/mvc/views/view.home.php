<?php
  class Home_View {
      function fn_home_view($registration, $data){
          ?>
            <div class="section no-pad-bot" id="index-banner">
              <div class="container">
                <br><br>
                <h1 class="header center orange-text">Blagues</h1>
                <div class="row center">
                  <h5 class="header col s12 light">Le plus grand site de blague francophone</h5>
                </div>
                <div class="row center">
                <?php if ($registration->CheckLogin()){?>
                    <a href="http://localhost/jokes/blague?action=create" id="download-button" class="btn-large waves-effect waves-light orange">
                <?php } else { ?>
                    <a href="http://localhost/jokes/inscription" id="download-button" class="btn-large waves-effect waves-light orange">
                <?php } ?>
                      Proposer une blague
                  </a>
                </div>
                <br><br>

              </div>
            </div>

            <div class="container">
                <div class="row"><h4>Les 10 dernières blagues :</h4></div>
                <div class="section">
                    <?php
                    if (isset($data) && !empty($data)){
                        foreach ($data as $key => $joke){
                            ?>
                                <div class="card">
                                  <div class="card-header">
                                      <div class="chip">
                                       <img src="<?php echo $joke['author']['avatar']; ?>" alt="Avatar">
                                       <?php echo $joke['author']['display_name']; ?>
                                      </div>
                                      <div class="chip">
                                       Posté le : <?php echo $joke['created']; ?>
                                      </div>
                                    <span class="new badge" data-badge-caption="Blague courte"></span>
                                    <span class="new badge red" data-badge-caption="Blague raciste"></span>
                                  </div>
                                  <div class="card-content">
                                    <span class="card-title grey-text text-darken-4"><?php echo $joke['title']; ?><i class="material-icons right activator">more_vert</i></span>
                                    <div class="card-content-content">
                                        <?php echo $joke['content']; ?>
                                    </div>
                                  </div>
                                  <div class="card-action">
                                      <button class="btn btn-floating waves-effect waves-light blue">
                                           <i class="material-icons right">thumb_up</i>
                                      </button>
                                      <button class="btn btn-floating waves-effect waves-light red">
                                           <i class="material-icons right">thumb_down</i>
                                      </button>
                                  </div>
                                  <div class="card-reveal">
                                    <span class="card-title grey-text text-darken-4">Que souhaitez-vous faire ?<i class="material-icons right">close</i></span>
                                      <a>Proposer une correction</a><br>
                                      <a>Signaler cette blague</a>
                                  </div>
                                </div>
                            <?php
                        }
                    }

                    ?>
                </div>
            </div>


            <div class="container">
              <div class="section">

                <!--   Icon Section   -->
                <div class="row">
                  <div class="col s12 m4">
                    <div class="icon-block">
                      <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
                      <h5 class="center">Speeds up development</h5>

                      <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
                    </div>
                  </div>

                  <div class="col s12 m4">
                    <div class="icon-block">
                      <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
                      <h5 class="center">User Experience Focused</h5>

                      <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
                    </div>
                  </div>

                  <div class="col s12 m4">
                    <div class="icon-block">
                      <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
                      <h5 class="center">Easy to work with</h5>

                      <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
                    </div>
                  </div>
                </div>

              </div>
              <br><br>
            </div>
        <?php
      }
  }
?>

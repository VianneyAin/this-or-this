<?php
  class Home_View {
      private $user_object;

      function __construct($user_object){
          $this->user_object = $user_object;
      }

      function fn_home_view($registration, $data){
          ?>
            <div class="section no-pad-bot" id="index-banner">
              <div class="container">
                <br><br>
                <h1 class="header center orange-text">Blagues</h1>
                <div class="row center">
                  <h5 class="header col s12 light">Le plus grand site de blague francophone (mdr)</h5>
                </div>
                <div class="row center">
                <?php if ($registration->CheckLogin()){?>
                    <a href="http://localhost/jokes/blague/create" id="download-button" class="btn-large waves-effect waves-light orange">
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
              <div class="section">

                <!--   Icon Section   -->
                <div class="row">
                  <div class="col s12 m4">
                    <div class="icon-block">
                      <h2 class="center light-blue-text"><i class="material-icons">thumb_up</i></h2>
                      <h5 class="center">Evaluer les blagues</h5>

                      <p class="light">Noter les blagues que vous lisez, ajoutez les à vos favoris. Retrouvez les meilleures blagues que vous ayez lues en un simple clic.</p>
                    </div>
                  </div>

                  <div class="col s12 m4">
                    <div class="icon-block">
                      <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
                      <h5 class="center">Trouvez les meilleurs blagueurs</h5>

                      <p class="light">Un des blagueurs vous fais rire ? Ajoutez le sans tarder à vos favoris, pour ne plus rater la moindre blague qu'il poste !</p>
                    </div>
                  </div>

                  <div class="col s12 m4">
                    <div class="icon-block">
                      <h2 class="center light-blue-text"><i class="material-icons">poll</i></h2>
                      <h5 class="center">Que le meilleur gagne</h5>

                      <p class="light">Notez des blagues, ajoutez-en, et gagner en niveau pour débloquer des récompenses.</p>
                    </div>
                  </div>
                </div>

              </div>
              <br><br>
            </div>

            <div class="container">
                <div class="row"><h4>Les 10 dernières blagues :</h4></div>
                <div class="section">
                    <?php
                    if (isset($data['jokes']) && !empty($data['jokes'])){
                        foreach ($data['jokes'] as $key => $joke){
                            ?>
                                <div class="card joke" data-id="<?php echo $joke['joke_id']; ?>">
                                  <div class="card-header">
                                      <div class="chip">
                                       <img src="<?php echo $joke['author']['avatar']; ?>" alt="Avatar">
                                       <?php echo $joke['author']['display_name']; ?>
                                      </div>
                                      <div class="chip">
                                       Posté le : <?php echo $joke['created']; ?>
                                      </div>
                                      <?php
                                      if (isset($joke['category']) && !empty($joke['category'])){
                                          if (isset($data['categories']) && !empty($data['categories'])){
                                              $categories_array = explode(',', $joke['category']);
                                              foreach ($categories_array as $key => $category_id){
                                                  foreach ($data['categories'] as $key => $category){
                                                      if ($category['category_id'] == $category_id){
                                                          echo '<span class="new badge" data-badge-caption="'.$category['name'].'"></span>';
                                                      }
                                                  }
                                              }

                                          }
                                      }
                                       ?>
                                  </div>
                                  <div class="card-content">
                                    <span class="card-title grey-text text-darken-4"><?php echo $joke['title']; ?><i class="material-icons right activator">more_vert</i></span>
                                    <div class="card-content-content">
                                        <?php echo $joke['content']; ?>
                                    </div>
                                  </div>
                                  <?php if (isset($this->user_object) && isset($this->user_object->userID) && !empty($this->user_object->userID)){ ?>
                                      <div class="card-action">
                                          <?php
                                          if (isset($joke['user_rating']) && isset($joke['user_rating']['value'])){
                                              $rating = $joke['user_rating']['value'];
                                          }
                                          else {
                                              $rating = 0;
                                          }
                                          ?>
                                          <div class="rating-action" data-rate="<?php echo $rating; ?>">
                                              <i class="ratings_stars material-icons" data-rate="1">star_border</i>
                                              <i class="ratings_stars material-icons" data-rate="2">star_border</i>
                                              <i class="ratings_stars material-icons" data-rate="3">star_border</i>
                                              <i class="ratings_stars material-icons" data-rate="4">star_border</i>
                                              <i class="ratings_stars material-icons" data-rate="5">star_border</i>
                                          </div>
                                      </div>
                                  <?php } ?>
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
        <?php
      }
  }
?>

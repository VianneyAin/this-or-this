<?php
class Jokes_View {
    private $user_object;

    public function __construct($user_object) {
        $this->user_object = $user_object;
    }

    public function single_joke_view($joke){
        ?>
        <div class="container">
            <div class="section">
                <div class="card joke" data-id="<?php echo $joke['joke_id']; ?>">
                    <div class="card-header">
                        <div class="chip">
                            <img src="<?php echo $joke['author']['avatar']; ?>" alt="Avatar">
                            <?php echo $joke['author']['display_name']; ?>
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
            </div>
        </div>
        <?php
    }

    public function joke_create_view($post_data = null){
        if (isset($post_data['callback']) && $post_data['callback']['success'] === true){
            $post_data['joke_title'] = '';
            $post_data['joke_content'] = '';
        }
        ?>
        <div class="container">
            <div class="section">
                <div class="row">
                    <div class="col m6 offset-m3 s12">
                    </div>
                </div>
                <div class="row">
                    <form class="col m6 offset-m3 s12" action="create" method='post' accept-charset='UTF-8'>
                        <div class="row"><h4>Propose une blague</h4></div>
                        <div class="row">
                            <input type='hidden' name='form_action' id='submitted' value='create'/>
                            <div class="input-field col s12">
                                <textarea id="joke_content" class="materialize-textarea <?php if (isset($post_data['callback']) && !empty($post_data['callback']['success']) && $post_data['callback']['success'] == false && $post_data['callback']['field'] == 'joke_content') echo 'invalid'; ?>" name="joke_content"><?php if (isset($post_data['joke_content']) && !empty($post_data['joke_content'])) echo $post_data['joke_content']; ?></textarea>
                                <label for="joke_content">Votre blague</label>
                            </div>
                        </div>
                        <div class="row right-align">
                            <button class="btn waves-effect waves-light orange" type="submit" name="action">Soumettre
                                <i class="material-icons right">send</i>
                            </button>
                        </div>
                        <?php if (isset($post_data['callback']) && !empty($post_data['callback']) && $post_data['callback']['success'] == false){ ?>
                            <div class="row">
                                <div class="col s12 error">
                                    <i class="material-icons">warning</i>
                                    <?php echo $post_data['callback']['message']; ?>
                                </div>
                            </div>
                        <?php }
                        else if (isset($post_data['callback']) && !empty($post_data['callback']) && $post_data['callback']['success'] == true){?>
                            <div class="row">
                                <div class="col s12 success">
                                    <i class="material-icons">check</i>
                                    <?php echo $post_data['callback']['message']; ?>
                                </div>
                            </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
        <script>
        $('#joke_content').trigger('autoresize');
        </script>
        <?php
    }

    public function joke_success_view($data){
        ?>
            <div class="container">
                <div class="section">
                    <div class="row">
                        <div class="col m6 offset-m3 s12">
                        </div>
                    </div>
                    <div class="row center-align">
                        <div class="row"><h4 class="orange-text text-lighten-1">Votre blague a été soumise</h4></div>
                        <div class="row">
                            <div class="input-field col s12">
                                <p>Merci d'avoir pris le temps de nous soumettre votre blague.</p>
                                <p>Votre blague sera modérée et si elle semble conforme à la charte de notre site, elle sera alors publiée. Cette action peut prendre jusqu'à 24h.</p>
                            </div>
                        </div>
                        <div class="row center-align">
                            <a href="http://localhost/jokes" class="btn-large waves-effect waves-light orange" name="action">Retour à l'accueil
                                <i class="material-icons right">home</i>
                            </a>
                            <a href="http://localhost/jokes/blague/create" class="btn-large waves-effect waves-light orange" name="action">Proposer une autre blague
                                <i class="material-icons right">send</i>
                            </a>
                        </div>

                        <?php if (isset($post_data['callback']) && !empty($post_data['callback']) && $post_data['callback']['success'] == false){ ?>
                            <div class="row">
                                <div class="col s12 error">
                                    <i class="material-icons">warning</i>
                                    <?php echo $post_data['callback']['message']; ?>
                                </div>
                            </div>
                        <?php }
                        else if (isset($post_data['callback']) && !empty($post_data['callback']) && $post_data['callback']['success'] == true){?>
                            <div class="row">
                                <div class="col s12 success">
                                    <i class="material-icons">check</i>
                                    <?php echo $post_data['callback']['message']; ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php
    }

    public function joke_category_view($data){
        ?>
        <div class="container">
            <div class="row"><h4>Liste des blagues de la catégorie : <?php echo $data['category']['name']; ?></h4></div>
            <div class="section">
                <?php
                if (isset($data['jokes']) && !empty($data['jokes'])){
                    foreach ($data['jokes'] as $key => $joke){
                        ?>
                            <div class="card joke" data-id="<?php echo $joke['joke_id']; ?>">
                              <div class="card-header">
                                  <div class="chip">
                                   <img src="<?php echo $joke['avatar']; ?>" alt="Avatar">
                                   <?php echo $joke['firstname']; ?>
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

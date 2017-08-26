<?php
class Jokes_View {
    public function __construct() {

    }

    public function single_joke_view($joke){
        ?>
        <div class="container">
            <div class="section">
                <div class="card">
                    <div class="card-header">
                        <div class="chip">
                            <img src="<?php echo $joke['author']['avatar']; ?>" alt="Contact Person">
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
                    <form class="col m6 offset-m3 s12" action="blague" method='post' accept-charset='UTF-8'>
                        <div class="row"><h4>Propose une blague</h4></div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type='hidden' name='submitted' id='submitted' value='1'/>
                                <input id="joke_title" type="text" class="validate <?php if (isset($post_data['callback']) && !empty($post_data['callback']['success']) && $post_data['callback']['success'] == false && $post_data['callback']['field'] == 'joke_title') echo 'invalid'; ?>" name="joke_title" value="<?php if (isset($post_data['joke_title']) && !empty($post_data['joke_title'])) echo $post_data['joke_title']; ?>">
                                <label for="joke_title">Titre de la blague</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <textarea id="joke_content" class="materialize-textarea <?php if (isset($post_data['callback']) && !empty($post_data['callback']['success']) && $post_data['callback']['success'] == false && $post_data['callback']['field'] == 'joke_content') echo 'invalid'; ?>" name="joke_content"><?php if (isset($post_data['joke_content']) && !empty($post_data['joke_content'])) echo $post_data['joke_content']; ?></textarea>
                                <label for="joke_content">Votre blague</label>
                            </div>
                        </div>
                        <div class="row right-align">
                            <button class="btn waves-effect waves-light" type="submit" name="action">Soumettre
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



}
?>

<?php
class Infinite_View {
    public function __construct() {

    }

    public function display_infinite_view($categories){
        ?>
        <div id="tot_container" class="container" style="height:100%;">
            <div class="starter">
                <div class="gallery gallery-masonry row center">
                      <div class="col s12 m6 push-m3 gallery-item gallery-filter" style="">
                          <div class="collection-item">
                              <a class="gallery-cover start_btn" style="min-height:200px;">
                                  <img src="http://localhost/this-or-this/img/logo/<?php _t('infinite_mode_logo_blue.svg'); ?>" style="width:100%;">
                              </a>
                          </div>
                      </div>
                </div>
                <div class="row">
                    <div class="col s12 centered">
                        <h4 class="tot_title"><?php _t('Infinite Mode'); ?></h4>
                        <p><?php _t('Hold for as long as you can without being fooled, and try to beat your own record or the one of your friends!'); ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 centered">
                        <a class="btn-large waves-effect waves-light btn red start_btn disabled"><?php _t('Start'); ?></a>
                    </div>
                </div>
            </div>
            <div class="over">
                <div class="gallery gallery-masonry row center">
                      <div class="col s12 m6 push-m3 gallery-item gallery-filter" style="">
                          <div class="collection-item">
                                <img src="http://localhost/this-or-this/img/logo/<?php _t('infinite_mode_logo_blue.svg'); ?>" style="width:100%;">
                          </div>
                      </div>
                </div>
                <div class="row">
                    <div class="col s12 centered">
                        <h4>Your score : <span class="result"></span></h4>
                    </div>
                </div>
                <div class="container social-container">
                    <div class="row social-container">
                        <div class="col s12 centered">
                            <p><?php _t('Not too bad, try again or share your score with your friends !'); ?></p>
                        </div>
                        <div class="col s12 centered">
                            <div class="row">
                                <div id="twitter-container" class="col s12 m3 offset-m3">

                                </div>
                                <div class="col s12 m3">
                                    <div class="fb-like" data-href="<?php echo get_siteurl(); ?>" data-layout="button_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 centered">
                        <a class="waves-effect waves-light btn red start_btn"><?php _t('Start again'); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container over" style="margin-bottom:100px;">
            <div class="section">
                <div class="row">
                    <div class="col s12">
                        <h3><?php _t("Want to try out something else ?"); ?></h3>
                        <div class="gallery gallery-masonry row center">
                            <?php if (isset($categories) && !empty($categories)){
                                foreach ($categories as $key => $category){
                                    ?>
                                    <div class="col s12 m3 gallery-item gallery-filter" style="">
                                        <div class="collection-item">
                                            <a class="gallery-cover" href="http://<?php _t('localhost/this-or-this');?>/tot/<?php echo $category['slug']; ?>" style="min-height:200px;">
                                                <img src="http://localhost/this-or-this/img/thumbnail/<?php echo $category['thumbnail']; ?>" style="width:100%;">
                                            </a>
                                            <a class="gallery-header" href="http://<?php _t('localhost/this-or-this');?>/tot/<?php echo $category['slug']; ?>">
                                                <span class="title">
                                                    <?php _t($category['title']); ?>
                                                    <?php if (isset($category['total']) && !empty($category['total'])){
                                                        echo ' ('.$category['total'].')';
                                                    }
                                                    ?>
                                                    <?php if (isset($category['nsfl']) && !empty($category['nsfl']) && $category['nsfl'] == 1){
                                                        echo ' (NSFL)';
                                                    }
                                                    ?>
                                                </span>
                                            </a>

                                        </div>
                                    </div>
                                    <?php
                                }
                            }?>
                        </div>
                    </div>
                </div>
                <div class="row center">
                    <a href="http://<?php _t('localhost/this-or-this');?>/tot/" id="download-button" class="btn waves-effect waves-light cyan darken-3"><?php _t('See all categories'); ?></a>
                </div>
            </div>
        </div>


        <script type="text/javascript">
            var timer = 2000;
            var step = 0;
            var game = true;
            var score = 0;
            var data = new Object();
            var active = false;
            var twitter_text_url = 'https://twitter.com/intent/tweet?text=';

            function set_twitter_button(){
                // Remove existing iframe
                jQuery('.twitter-tweet-button').each(function(){
                    jQuery(this).remove();
                });

                var twitter_score_text = "<?php _t("I made a score of {score} to {tag}, who can beat me?"); ?>";
                twitter_score_text = twitter_score_text.replace("{score}", score);
                twitter_score_text = twitter_score_text.replace('{tag}', '#infinitemode');

                var tweetBtn = $('<a></a>')
                .addClass('twitter-share-button')
                .attr('href', twitter_text_url+twitter_score_text)
                .attr('data-url', "<?php echo get_siteurl(); ?>")
                .attr('data-via', 'thisorthis')
                .attr('data-size', 'large')
                .attr('data-hashtags', 'thisorthis,infinitemode')
                $('#twitter-container').append(tweetBtn);
                twttr.widgets.load();
            }

            function display_score(){
                jQuery('.step').each(function(){
                    jQuery(this).hide();
                });
                jQuery('.over .result').text(score);
                jQuery('.over').show();
                set_twitter_button();
            }

            function show_next(){
                jQuery('.step').each(function(){
                    jQuery(this).hide();
                    if (jQuery(window).width() < 480){
                        jQuery(this).height(jQuery(window).height());
                    }
                });
                active = false;
                if (game){
                    jQuery('.step_'+step).show();
                    load_next_element();
                }
                else {
                    display_score();
                    rein_game();
                }
            }

            function show_result(result){
                jQuery('.step').each(function(){
                    if (jQuery(this).is(':visible')){
                        if (result){
                            jQuery(this).find('.answer').addClass('correct');
                        }
                        else {
                            jQuery(this).find('.answer').addClass('wrong');
                        }
                        jQuery(this).find('.img_hidden').hide();
                        jQuery(this).find('.img_reveal').show();
                    }
                });
                setTimeout(show_next, timer);
            }

            jQuery(document).ready(function(){
                load_initial_element();
                jQuery('.start_btn').click(function(){
                    step++;
                    jQuery('.starter').hide();
                    jQuery('.over').hide();
                    show_next();
                });
            });

            function load_initial_element(){
              var ajax = $.ajax({
                  url: ajaxurl,
                  data: {
                      from: 'user',
                      action: 'get_random_tot',
                      lang: <?php echo "'".Application::this()->current_lang."'"; ?>
                  },
                  type: 'POST',
                  dataType : 'json',
                  beforeSend: function (jqXHR, settings) {
                      url = settings.url + "?" + settings.data;
                      console.log(url);
                  },
                  error: function (thrownError) {
                      console.log(thrownError);
                      //alert(thrownError.responseText);
                  },
                  complete: function () {
                  },
                  success: function (data, status) {
                    jQuery('#tot_container').append('<div class="step step_'+(step+1)+'" data-value="'+data.element.choice+'"><div class="row img_container"><div class="col s12 img_hidden"><img class="tot_img" src="'+data.element.hidden_image+'" /></div><div class="col s12 img_reveal"><div class="answer">'+data.element.choice+'</div><img class="tot_img" src="'+data.element.reveal_image+'" /></div></div><div class="row tot_footer"><div class="col s4 centered"><a class="waves-effect waves-light btn btn-large response_btn cyan darken-3" data-value="'+data.choice_1+'">'+data.choice_1+'</a></div><div class="col s4 centered"><h4>'+(step+1)+'</h4></div><div class="col s4 centered"><a class="waves-effect waves-light btn btn-large response_btn cyan darken-3" data-value="'+data.choice_2+'">'+data.choice_2+'</a></div></div></div>');
                    jQuery('.start_btn').removeClass('disabled');
                    jQuery('.response_btn').click(function(){
                        if (!active){
                            active = true;
                            var answer = jQuery(this).closest('.step').attr('data-value');
                            var current = jQuery(this).attr('data-value');
                            if (game){
                                if (answer == current){
                                    score++;
                                    show_result(true);
                                }
                                else {
                                    game = false;
                                    show_result(false);
                                }
                            }
                        }
                    });
                  }
              });

            }

            function load_next_element(){
              var ajax = $.ajax({
                  url: ajaxurl,
                  data: {
                      from: 'user',
                      action: 'get_random_tot',
                      lang: <?php echo "'".Application::this()->current_lang."'"; ?>
                  },
                  type: 'POST',
                  dataType : 'json',
                  beforeSend: function (jqXHR, settings) {
                      url = settings.url + "?" + settings.data;
                      //console.log(url);
                  },
                  error: function (thrownError) {
                      console.log(thrownError);
                      alert(thrownError.responseText);
                  },
                  complete: function () {
                  },
                  success: function (data, status) {
                    jQuery('#tot_container').append('<div class="step step_'+step+'" data-value="'+data.element.choice+'"><div class="row img_container"><div class="col s12 img_hidden"><img class="tot_img" src="'+data.element.hidden_image+'" /></div><div class="col s12 img_reveal"><div class="answer">'+data.element.choice+'</div><img class="tot_img" src="'+data.element.reveal_image+'" /></div></div><div class="row tot_footer"><div class="col s4 centered"><a class="waves-effect waves-light btn btn-large response_btn cyan darken-3" data-value="'+data.choice_1+'">'+data.choice_1+'</a></div><div class="col s4 centered"><h4>'+step+'</h4></div><div class="col s4 centered"><a class="waves-effect waves-light btn btn-large response_btn cyan darken-3" data-value="'+data.choice_2+'">'+data.choice_2+'</a></div></div></div>');
                    jQuery('.response_btn').click(function(){
                        if (!active){
                            active = true;
                            var answer = jQuery(this).closest('.step').attr('data-value');
                            var current = jQuery(this).attr('data-value');
                            if (game){
                                if (answer == current){
                                    score++;
                                    show_result(true);
                                }
                                else {
                                    game = false;
                                    show_result(false);
                                }
                            }
                        }
                    });
                  }
              });
              step = step+1;
            }

            function rein_game () {
                game = true;
                score = 0;
                step = 0;
                jQuery('.step').each(function(){
                    jQuery(this).remove();
                });
                load_initial_element();
            }

        </script>
        <?php
    }
}
?>

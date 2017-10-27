<?php
class Tot_View {
    public function __construct() {

    }

    public function display_tot_categories_view($data){
        ?>
        <div class="container">
            <div class="row topic-list">
                <div class="col s12 m6 centered">
                    <h4><?php _t('All topics'); ?></h4>
                </div>
            </div>
            <div class="gallery gallery-masonry row">
                <?php if (isset($data) && !empty($data) && isset($data['categories']) && !empty($data['categories'])){
                    foreach ($data['categories'] as $key => $category){
                        ?>
                        <div class="col s12 m3 gallery-item gallery-filter" style="">
                            <div class="collection-item">
                                <a class="gallery-cover" href="http://localhost/this-or-this/<?php _t('tot');?>/<?php echo $category['slug']; ?>" style="min-height:200px;">
                                    <img src="<?php echo $category['thumbnail']; ?>" style="width:100%;">
                                </a>
                                <a class="gallery-header" href="http://localhost/this-or-this/<?php _t('tot');?>/<?php echo $category['slug']; ?>">
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

        <?php
    }

    public function display_tot_category_view($data){
      if (isset($data) && !empty($data)){
        $data['choice_1'] = __t($data['choice_1']);
        $data['choice_2'] = __t($data['choice_2']);
        foreach ($data['elements'] as $key => $elmt){
          $data['elements'][$key]['choice'] = __t($elmt['choice']);
        }
      }
        ?>
        <style>
            .tot_img {
                max-height:500px;
                max-width:100%;
            }

            #tot_footer {
                bottom:0px;
            }
            #tot_container {
                margin-top:20px;
            }

            .centered {
                text-align: center;
            }
            .step, .over {
                display:none;
            }

            .step .img_reveal {
                display:none;
            }

            .step .answer {
                position: absolute;
                top: 20%;
                left:50%;
                font-size: 50px;
                text-transform: uppercase;
                font-weight: 500;
                transform: translateX(-50%);
            }

            .step .wrong {
                color:red;
            }

            .step .correct {
                color:lime;
            }

            .img_hidden, .img_reveal {
                max-height:70%;
                text-align:center;
            }
            .tot_title {
                text-transform: uppercase;
            }

        </style>
        <div id="tot_container" class="container" style="height:100%;">
            <div class="starter">
                <div class="gallery gallery-masonry row center">
                    <?php if (isset($data) && !empty($data) ){
                        ?>
                        <div class="col s12 m6 push-m3 gallery-item gallery-filter" style="">
                            <div class="collection-item">
                                <a class="gallery-cover start_btn" style="min-height:200px;">
                                    <img src="<?php echo $data['thumbnail']; ?>" style="width:100%;">
                                </a>
                            </div>
                        </div>
                        <?php
                    }?>
                </div>
                <div class="row">
                    <div class="col s12 centered">
                        <h4 class="tot_title"><?php
                        if (isset($data) && !empty($data)){
                            echo __t($data['choice_1']). ' '.__t('or').' '. __t($data['choice_2']);
                        }
                        ?> ?</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 centered">
                        <a class="btn-large waves-effect waves-light btn red start_btn"><?php _t('Start'); ?></a>
                    </div>
                </div>
            </div>
            <div class="over">
                <div class="gallery gallery-masonry row center">
                    <?php if (isset($data) && !empty($data) ){
                        ?>
                        <div class="col s12 m6 push-m3 gallery-item gallery-filter" style="">
                            <div class="collection-item">
                                <a class="gallery-cover" href="http://localhost/this-or-this/tot/<?php echo $data['slug']; ?>" style="min-height:200px;">
                                    <img src="<?php echo $data['thumbnail']; ?>" style="width:100%;">
                                </a>
                            </div>
                        </div>
                        <?php
                    }?>
                </div>
                <div class="row">
                    <div class="col s12 centered">
                        <h4>Your score : <span class="result"></span>/<span class="total"></span></h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 centered">
                        <a class="waves-effect waves-light btn red start_btn"><?php _t('Start again'); ?></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container social-container">
          <div class="row">
            <div class="col s12 m2">
              <a class="fb-share-button" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>" target="_blank">
                <i class="fa fa-facebook-official" aria-hidden="true"></i><span><?php _t('Share'); ?></span>
              </a>
            </div>
            <div class="col s12 m2">
              <div class="fb-like" data-href="http://this-or-this.tk/tot/michael-jackson-or-not" data-layout="button" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
            </div>
            <div class="col s12 m2">
              <?php
              $twitter_text = __t($data['choice_1']). ' '.__t('or').' '. __t($data['choice_2']).' ?';
              $hashtag = 'thisorthis, '.__t($data['slug']);
              ?>
              <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text=<?php echo $twitter_text; ?>&" data-hashtags="<?php echo $hashtag; ?>" data-via="thisorthis" data-size="large">
                Tweet
              </a>
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

            function display_score(){
                jQuery('.step').each(function(){
                    jQuery(this).hide();
                });
                jQuery('.over .result').text(score);
                jQuery('.over').show();
            }

            function show_next(){
                jQuery('.step').each(function(){
                    jQuery(this).hide();
                });
                active = false;
                if (game){
                    jQuery('.step_'+step).find('.img_hidden').hide();
                    jQuery('.step_'+step).find('.img_reveal').show();
                    step = step + 1;
                    jQuery('.step_'+step).show();
                    if (step > data.elements.length){
                        display_score();
                    }
                }
                else {
                    display_score();
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

            function shuffle(a) {
                for (let i = a.length; i; i--) {
                    let j = Math.floor(Math.random() * i);
                    [a[i - 1], a[j]] = [a[j], a[i - 1]];
                }
            }

            function create_elements (){
                jQuery('.step').each(function(){
                    jQuery(this).remove();
                });
                shuffle(data.elements);
                var nb = 0;
                var total = data.elements.length;

                data.elements.forEach(function (element){
                    nb++;
                    jQuery('#tot_container').append('<div class="step step_'+nb+'" data-value="'+element.choice+'"><div class="row"><div class="col s12 img_hidden"><img class="tot_img" src="'+element.hidden_image+'" /></div><div class="col s12 img_reveal"><div class="answer">'+element.choice+'</div><img class="tot_img" src="'+element.reveal_image+'" /></div></div><div id="tot_footer" class="row" style="max-height:10%"><div class="col s4 centered"><a class="waves-effect waves-light btn btn-large response_btn cyan darken-3" data-value="'+data.choice_1+'">'+data.choice_1+'</a></div><div class="col s4 centered"><h4>'+nb+'/'+total+'</h4></div><div class="col s4 centered"><a class="waves-effect waves-light btn btn-large response_btn cyan darken-3" data-value="'+data.choice_2+'">'+data.choice_2+'</a></div></div></div>');
                });
            }

            jQuery(document).ready(function(){
                <?php if (isset($data) && !empty($data)){
                    ?>
                    data = <?php echo json_encode($data); ?>;
                    <?php
                }?>
                jQuery('.start_btn').click(function(){
                    rein_game();
                    step = 0;
                    jQuery('.starter').hide();
                    step = step+1;

                    jQuery('.step').each(function(){
                        jQuery(this).hide();
                    });
                    jQuery('.step_'+step).show();
                });
            });

            function rein_game () {
                create_elements();
                game = true;
                score = 0;
                step = 0;
                jQuery('.over .total').text(data.elements.length);
                jQuery('.step').each(function(){
                    jQuery(this).find('.img_hidden').css('display', 'block');
                    jQuery(this).find('.img_reveal').css('display', 'none');
                    jQuery(this).find('.anwser').removeClass('correct');
                    jQuery(this).find('.anwser').removeClass('wrong');
                    jQuery(this).hide();
                });
                jQuery('.over').hide();
                jQuery('.start').show();
                jQuery('.response_btn').click(function(){
                    if (!active){
                        active = true;
                        var anwser = jQuery(this).closest('.step').attr('data-value');
                        var current = jQuery(this).attr('data-value');
                        if (game){
                            if (anwser == current){
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
        </script>
        <?php
    }
}
?>

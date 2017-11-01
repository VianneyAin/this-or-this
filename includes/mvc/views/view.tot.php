<?php
class Tot_View {
    public function __construct() {

    }

    public function display_tot_categories_view($data){
        ?>
        <div class="container">
            <div class="row">
                <div class="col s12 m6">
                    <h4><?php _t('All topics'); ?></h4>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <?php _t('Search'); ?> : <input id="search" type="text">
                </div>
            </div>
            <div class="gallery gallery-masonry row category-gallery">
                <?php if (isset($data) && !empty($data) && isset($data['categories']) && !empty($data['categories'])){
                    foreach ($data['categories'] as $key => $category){
                        ?>
                        <div class="col s12 m3 gallery-item gallery-filter category-item" style="">
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
        <script type="text/javascript">
            $('#search').keyup(function () {
                var rex = new RegExp($(this).val(), 'i');
                $('.category-gallery .category-item').hide();
                $('.category-gallery .category-item').filter(function () {
                    return rex.test($(this).find('.title').text());
                }).show();
            });
        </script>
        <?php
    }

    public function display_tot_category_view($data, $categories){
        if (isset($data) && !empty($data)){
            $data['choice_1'] = __t($data['choice_1']);
            $data['choice_2'] = __t($data['choice_2']);
            if (isset($data['elements']) && !empty($data['elements'])){
                foreach ($data['elements'] as $key => $elmt){
                    $data['elements'][$key]['choice'] = __t($elmt['choice']);
                    if ($data['local']){
                        $data['elements'][$key]['hidden_image'] = 'http://localhost/this-or-this'.$data['elements'][$key]['hidden_image'];
                        $data['elements'][$key]['reveal_image'] = 'http://localhost/this-or-this'.$data['elements'][$key]['reveal_image'];
                    }
                }
            }
        }
        ?>
        <div id="tot_container" class="container" style="height:100%;">
            <div class="starter">
                <div class="gallery gallery-masonry row center">
                    <?php if (isset($data) && !empty($data) ){
                        ?>
                        <div class="col s12 m6 push-m3 gallery-item gallery-filter" style="">
                            <div class="collection-item">
                                <a class="gallery-cover start_btn" style="min-height:200px;">
                                    <img src="http://localhost/this-or-this/img/thumbnail/<?php echo $data['thumbnail']; ?>" style="width:100%;">
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
                                    <img src="http://localhost/this-or-this/img/thumbnail/<?php echo $data['thumbnail']; ?>" style="width:100%;">
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
                <div class="container social-container">
                    <div class="row social-container">
                        <div class="col s12 centered success" style="display:none;">
                            <p><?php _t('Congratz ! You killed it !'); ?></p>
                            <p><?php _t('Share your score with your friends, or try another category.'); ?></p>
                        </div>
                        <div class="col s12 centered failed" style="display:none;">
                            <p><?php _t('Too bad you were almost done !'); ?></p>
                            <p><?php _t('Try again, pick another category or see if your friends can beat your score.'); ?></p>
                        </div>
                        <div class="col s12 centered">
                            <div class="row">
                                <div id="twitter-container" class="col s12 m3 offset-m3">
                                    <?php
                                    $twitter_text = __t($data['choice_1']). ' '.__t('or').' '. __t($data['choice_2']).' ?';
                                    $hashtag = 'thisorthis, '.__t($data['slug']);
                                    ?>
                                    <a class="twitter-share-button twitter_score_button" href="https://twitter.com/intent/tweet?text=<?php echo $twitter_text; ?>&" data-hashtags="<?php echo $hashtag; ?>" data-via="thisorthis" data-size="large">
                                        Tweet
                                    </a>
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
    </div>


    <script type="text/javascript">
    var timer = 2000;
    var step = 0;
    var game = true;
    var score = 0;
    var data = new Object();
    var active = false;
    var twitter_text_url = 'https://twitter.com/intent/tweet?text=';
    var total = 0;

    function set_twitter_button(){
        // Remove existing iframe
        jQuery('.twitter-tweet-button').each(function(){
            jQuery(this).remove();
        });

        var twitter_score_text = "<?php _t("I made a score {score} to {tag}, who can beat me?"); ?>";
        twitter_score_text = twitter_score_text.replace("{score}", score+"/"+total);
        twitter_score_text = twitter_score_text.replace('{tag}', '#'+data.choice_1+'<?php _t('or'); ?>'+data.choice_2);

        var tweetBtn = $('<a></a>')
        .addClass('twitter-share-button')
        .attr('href', twitter_text_url+twitter_score_text)
        .attr('data-url', "<?php echo get_siteurl(); ?>")
        .attr('data-via', 'thisorthis')
        .attr('data-size', 'large')
        .attr('data-hashtags', 'thisorthis,'+data.choice_1+'<?php _t('or'); ?>'+data.choice_2)
        $('#twitter-container').append(tweetBtn);
        twttr.widgets.load();
    }

    function display_score(){
        jQuery('.step').each(function(){
            jQuery(this).hide();
        });
        jQuery('.over .result').text(score);
        jQuery('.over').show();
        if (score == total){
            jQuery('.over .success').show();
            jQuery('.over .failed').hide();
        }
        else {
            jQuery('.over .success').hide();
            jQuery('.over .failed').show();
        }
        set_twitter_button();
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
        total = data.elements.length;

        data.elements.forEach(function (element){
            nb++;
            jQuery('#tot_container').append('<div class="step step_'+nb+'" data-value="'+element.choice+'"><div class="row img_container"><div class="col s12 img_hidden"><img class="tot_img" src="'+element.hidden_image+'" /></div><div class="col s12 img_reveal"><div class="answer">'+element.choice+'</div><img class="tot_img" src="'+element.reveal_image+'" /></div></div><div class="row tot_footer"><div class="col s4 centered"><a class="waves-effect waves-light btn btn-large response_btn cyan darken-3" data-value="'+data.choice_1+'">'+data.choice_1+'</a></div><div class="col s4 centered"><h4>'+nb+'/'+total+'</h4></div><div class="col s4 centered"><a class="waves-effect waves-light btn btn-large response_btn cyan darken-3" data-value="'+data.choice_2+'">'+data.choice_2+'</a></div></div></div>');
        });
        jQuery('.step').each(function(){
            if (jQuery(window).width() < 480){
                jQuery(this).height(jQuery(window).height());
            }
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
        update_played();
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

    function update_played(){
        var ajax = $.ajax({
            url: ajaxurl,
            data: {
                from: 'user',
                action: 'update_tot_played',
                id: data.id,
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
            }
        });
    }
    </script>
    <?php
}
}
?>

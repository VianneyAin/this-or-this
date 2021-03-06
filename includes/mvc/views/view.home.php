<?php
class Home_View {
    private $user_object;

    function __construct($user_object){
        $this->user_object = $user_object;
    }

    function fn_home_view($data){
        ?>
        <div id="index-banner" >
            <div class="section no-pad-bot">
                <div class="container">
                    <br><br>
                    <div class="row center">
                        <img class="home_img" src="https://localhost/this-or-this/img/logo/thisorthis_logo_blue.png" />
                    </div>
                    <div class="row center">
                        <h1 class="header col s12 black-text light"><?php _t("It's time to make a choice"); ?>.</h1>
                    </div>
                    <div class="row center">
                        <div class="col s12 m4">
                            <a href="https://<?php _t('localhost/this-or-this');?>/tot/" id="download-button" class="btn-large waves-effect waves-light cyan darken-3 pulse"><?php _t('Get Started'); ?> !</a>
                        </div>
                        <div class="col s12 m4">
                            <h4><?php _t('or'); ?></h4>
                        </div>
                        <div class="col s12 m4">
                            <a href="https://<?php _t('localhost/this-or-this');?>/tot/" id="download-button" class="btn-large waves-effect waves-light cyan darken-3 pulse"><?php _t('Get Started'); ?> !</a>
                        </div>

                    </div>
                    <br><br>
                </div>
            </div>
        </div>
        <div class="cyan darken-1">
            <div class="section">
                <!--   Icon Section   -->
                <div class="row">
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center white-text"><i class="material-icons">reorder</i></h2>
                            <h5 class="center white-text"><?php _t('Select a topic'); ?></h5>
                            <p class="center light"><a href="https://<?php _t('localhost/this-or-this');?>/tot/" id="download-button" class="btn waves-effect waves-light cyan darken-3"><?php _t('Get Started'); ?></a></p>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center white-text"><i class="material-icons">swap_horiz</i></h2>
                            <h5 class="center white-text"><?php _t('Try to make a choice'); ?></h5>
                        </div>
                    </div>
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center white-text"><i class="material-icons">sync</i></h2>
                            <h5 class="center white-text"><?php _t('Retry till you win'); ?></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="valign-wrapper">
            <div class="container">
                <div class="section">
                    <div class="row center">
                        <h3 class="center col s12 light shadow-5"><?php _t('Latest Categories'); ?></h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="container" style="margin-bottom:100px;">
            <div class="section">
                <div class="row">
                    <div class="col s12 center">
                        <h3><i class="mdi-content-send brown-text"></i></h3>
                        <div class="gallery gallery-masonry row">
                            <?php if (isset($data) && !empty($data) && isset($data['categories']) && !empty($data['categories'])){
                                foreach ($data['categories'] as $key => $category){
                                    ?>
                                    <div class="col s12 m3 gallery-item gallery-filter" style="">
                                        <div class="collection-item">
                                            <a class="gallery-cover" href="https://<?php _t('localhost/this-or-this');?>/tot/<?php echo $category['slug']; ?>" style="min-height:200px;">
                                                <img src="https://localhost/this-or-this/img/thumbnail/<?php echo get_thumbnail_lang($category, Application::this()->current_lang); ?>" style="width:100%;">
                                            </a>
                                            <a class="gallery-header" href="https://<?php _t('localhost/this-or-this');?>/tot/<?php echo $category['slug']; ?>">
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
                    <a href="https://<?php _t('localhost/this-or-this');?>/tot/" id="download-button" class="btn waves-effect waves-light cyan darken-3"><?php _t('See all categories'); ?></a>
                </div>

            </div>
        </div>
    </div>

    <div class="cyan darken-1">
        <div class="section">
            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12">
                    <h3 class="white-text centered"><?php _t('Need a bigger challenge ?'); ?></h3>
                </div>
                <div class="col s6">
                    <h4 class="white-text centered"><?php _t('Try out infinite mode'); ?></h4>
                    <div class="row center">
                        <a href="https://<?php _t('localhost/this-or-this');?>/infinite">
                            <img class="home_img" src="https://localhost/this-or-this/img/logo/<?php _t('infinite_mode_logo_white.png'); ?>" height="300px" />
                        </a>
                    </div>
                    <div class="row center">
                        <a href="https://<?php _t('localhost/this-or-this');?>/infinite/" id="" class="btn waves-effect waves-light red darken-3"><?php _t('Give it a try !'); ?></a>
                    </div>
                </div>
                <div class="col s6">
                    <h4 class="white-text centered"><?php _t('Beat the clock with challenge mode'); ?></h4>
                    <div class="row center">
                        <a href="https://<?php _t('localhost/this-or-this');?>/challenge">
                            <img class="home_img" src="https://localhost/this-or-this/img/logo/<?php _t('challenge_mode_logo_white.png'); ?>" height="300px" />
                        </a>
                    </div>
                    <div class="row center">
                        <a href="https://<?php _t('localhost/this-or-this');?>/challenge/" id="" class="btn waves-effect waves-light red darken-3"><?php _t('Give it a try !'); ?></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php
}
}
?>

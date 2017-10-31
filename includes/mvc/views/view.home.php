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
                        <img src="http://localhost/this-or-this/img/logo_blue.svg" height='150px; '/>
                    </div>
                    <div class="row center">
                        <h1 class="header col s12 black-text light"><?php _t("It's time to make a choice"); ?>.</h1>
                    </div>
                    <div class="row center">
                        <div class="col s12 m4">
                            <a href="http://<?php _t('localhost/this-or-this');?>/tot/" id="download-button" class="btn-large waves-effect waves-light cyan darken-3 pulse"><?php _t('Get Started'); ?> !</a>
                        </div>
                        <div class="col s12 m4">
                            <h4><?php _t('or'); ?></h4>
                        </div>
                        <div class="col s12 m4">
                            <a href="http://<?php _t('localhost/this-or-this');?>/tot/" id="download-button" class="btn-large waves-effect waves-light cyan darken-3 pulse"><?php _t('Get Started'); ?> !</a>
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
                            <p class="center light"><a href="http://<?php _t('localhost/this-or-this');?>/tot/" id="download-button" class="btn waves-effect waves-light cyan darken-3"><?php _t('Get Started'); ?></a></p>
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

    <div class="cyan darken-1">
        <div class="section">
            <!--   Icon Section   -->
            <div class="row">
                <div class="col s12">
                    <h3 class="white-text centered"><?php _t('Need a bigger challenge ?'); ?></h3>
                </div>
                <div class="col s12">
                    <h4 class="white-text centered"><?php _t('Try out infinite mode'); ?></h4>
                </div>
                <div class="row center">
                    <a href="http://<?php _t('localhost/this-or-this');?>/infinite">
                        <img src="http://localhost/this-or-this/img/infinite_mode_logo_white.svg" height="300px" />
                    </a>
                </div>
                <div class="row center">
                    <a href="http://<?php _t('localhost/this-or-this');?>/infinite/" id="" class="btn waves-effect waves-light red darken-3"><?php _t('Give it a try !'); ?></a>
                </div>
            </div>
        </div>
    </div>

    <?php
}
}
?>

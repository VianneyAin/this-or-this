<?php
  class Home_View {
      private $user_object;

      function __construct($user_object){
          $this->user_object = $user_object;
      }

      function fn_home_view($data){
          ?>
          <div id="index-banner" class="parallax-container">
            <div class="section no-pad-bot">
              <div class="container">
                <br><br>
                <div class="row center">
                  <img src="img/logo_blue.svg" height='150px; '/>
                </div>
                <div class="row center">
                  <h5 class="header col s12 white-text light"><?php _t("It's time to make a choice"); ?>.</h5>
                </div>
                <div class="row center">
                  <a href="http://localhost/this-or-this/tot/" id="download-button" class="btn-large waves-effect waves-light teal lighten-2 pulse"><?php _t('Get Started'); ?></a>
                </div>
                <br><br>
              </div>
            </div>
            <div class="parallax"><img src="img/background1.jpg" alt="Unsplashed background img 1"></div>
          </div>


          <div class="container">
            <div class="section">

              <!--   Icon Section   -->
              <div class="row">
                <div class="col s12 m4">
                  <div class="icon-block">
                    <h2 class="center brown-text"><i class="material-icons">reorder</i></h2>
                    <h5 class="center"><?php _t('Select a topic'); ?></h5>

                    <p class="center light"><a href="http://localhost/this-or-this/<?php _t('tot');?>/" id="download-button" class="btn waves-effect waves-light teal lighten-2"><?php _t('Get Started'); ?></a></p>
                  </div>
                </div>

                <div class="col s12 m4">
                  <div class="icon-block">
                    <h2 class="center brown-text"><i class="material-icons">swap_horiz</i></h2>
                    <h5 class="center"><?php _t('Try to make a choice'); ?></h5>
                  </div>
                </div>

                <div class="col s12 m4">
                  <div class="icon-block">
                    <h2 class="center brown-text"><i class="material-icons">sync</i></h2>
                    <h5 class="center"><?php _t('Retry till you win'); ?></h5>
                  </div>
                </div>
              </div>

            </div>
          </div>


          <div class="parallax-container valign-wrapper">
            <div class="section no-pad-bot">
              <div class="container">
                <div class="row center">
                  <h3 class="center col s12 light shadow-5"><?php _t('Latest Categories'); ?></h3>
                </div>
              </div>
            </div>
            <div class="parallax"><img src="img/background2.jpg" alt="Unsplashed background img 2"></div>
          </div>

          <div class="container">
            <div class="section">
              <div class="row">
                <div class="col s12 center">
                  <h3><i class="mdi-content-send brown-text"></i></h3>
                  <div class="gallery gallery-masonry row">
                      <?php if (isset($data) && !empty($data) && isset($data['categories']) && !empty($data['categories'])){
                          foreach ($data['categories'] as $key => $category){
                              ?>
                                  <div class="col s12 m6 gallery-item gallery-filter" style="">
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
              </div>
              <div class="row center">
                  <a href="http://localhost/this-or-this/<?php _t('tot');?>/" id="download-button" class="btn waves-effect waves-light teal lighten-2"><?php _t('See all categories'); ?></a>
              </div>

            </div>
          </div>


          <!--<div class="parallax-container valign-wrapper">
            <div class="section no-pad-bot">
              <div class="container">
                <div class="row center">
                  <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
                </div>
              </div>
            </div>
            <div class="parallax"><img src="background3.jpg" alt="Unsplashed background img 3"></div>
          </div>

          <div class="container">
            <div class="section">

              <div class="row">
                <div class="col s12 center">
                  <h3><i class="mdi-content-send brown-text"></i></h3>
                  <h4>Contact Us</h4>
                  <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
                </div>
              </div>

            </div>
        </div>-->

        <?php
      }
  }
?>

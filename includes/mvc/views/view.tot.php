<?php
  class Tot_View {
    public function __construct() {

    }

    public function display_tot_categories_view($data){
        ?>
        <style>

            .topic-list{
                margin-top:50px;
            }
            .collection-item {
                box-shadow: 0 1px 4px rgba(0,0,0,0.1);
            }
            .gallery .gallery-cover {
                position: relative;
                overflow: hidden;
                display: block;
                width: 100%;
                -webkit-transform-origin: 0 0;
                transform-origin: 0 0;
                transition: top .5s;
                z-index: 2;
            }
            .gallery .gallery-cover img {
                box-shadow: 0 0 1px 0 rgba(0,0,0,0.1);
                max-width: 100%;
                width:100%;
                width: auto;
                display: block;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }
            .collection-item .gallery-header {
                display: block;
            }
            .gallery .gallery-header {
                position: relative;
                padding: 20px;
                background-color: #fff;
                color: #444;
            }
            .gallery .gallery-item {
                margin-top:20px;
            }
        </style>
        <div class="container">
            <div class="row topic-list">
                <div class="col s12 m6 centered">
                    <h4>All topics</h4>
                </div>
            </div>
            <div class="gallery gallery-masonry row">
                <?php if (isset($data) && !empty($data) && isset($data['categories']) && !empty($data['categories'])){
                    foreach ($data['categories'] as $key => $category){
                        ?>
                            <div class="col s12 m6 gallery-item gallery-filter" style="">
                                <div class="collection-item">
                                    <a class="gallery-cover" href="http://localhost/this-or-this/tot/<?php echo $category['slug']; ?>" style="min-height:200px;">
                                        <img src="<?php echo $category['thumbnail']; ?>" style="width:100%;">
                                    </a>
                                    <a class="gallery-header" href="http://localhost/this-or-this/tot/<?php echo $category['slug']; ?>">
                                        <span class="title">
                                            <?php echo $category['title']; ?>
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
          width:100%;
          top: 20%;
          font-size: 50px;
          text-transform: uppercase;
          font-weight: 500;
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
          <div class="row">
            <div class="col s12 centered">
              <h4 class="tot_title"><?php
              if (isset($data) && !empty($data)){
                echo $data['choice_1']. ' or '. $data['choice_2'];
              }
              ?> ?</h4>
            </div>
          </div>
          <div class="row">
            <div class="col s12 centered">
              <a class="btn-large waves-effect waves-light btn red start_btn">Start</a>
            </div>
          </div>
        </div>
        <div class="over">
          <div class="row">
            <div class="col s12 centered">
              <h4>Your score : <span class="result"></span>/<span class="total"></span></h4>
            </div>
          </div>
          <div class="row">
            <div class="col s12 centered">
              <a class="waves-effect waves-light btn red start_btn">Start again</a>
            </div>
          </div>
        </div>
      </div>
      <script type="text/javascript">
      var timer = 2000;
      var step = 0;
      var game = true;
      var score = 0;
      var data = new Object()
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
          jQuery('#tot_container').append('<div class="step step_'+nb+'" data-value="'+element.choice+'"><div class="row"><div class="col s12 img_hidden"><img class="tot_img" src="'+element.hidden_image+'" /></div><div class="col s12 img_reveal"><div class="answer">'+element.choice+'</div><img class="tot_img" src="'+element.reveal_image+'" /></div></div><div id="tot_footer" class="row" style="max-height:10%"><div class="col s4 centered"><a class="waves-effect waves-light btn btn-large response_btn" data-value="'+data.choice_1+'">'+data.choice_1+'</a></div><div class="col s4 centered"><h5>'+nb+'/'+total+'</h5></div><div class="col s4 centered"><a class="waves-effect waves-light btn btn-large response_btn" data-value="'+data.choice_2+'">'+data.choice_2+'</a></div></div></div>');
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
        });
      }
      </script>
      <?php
    }
  }
?>

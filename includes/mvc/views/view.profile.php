<?php
class Profile_View {
    private $user_object;

    public function __construct($user_object) {
        $this->user_object = $user_object;
    }


    //full code at https://codepen.io/Roemerdt/pen/epKjdM/
    public function profile_current_user_view($registration, $user, $jokes){
        ?>
        <style>
            header nav {
                position: fixed;
                z-index: 1000;
                background: #2196F3;
            }
            header nav ul {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: justify;
                -ms-flex-pack: justify;
                justify-content: space-between;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
            }
            header nav ul li a {
                line-height: 1;
            }
            header nav ul li:hover {
                background: transparent;
            }
            header nav ul #title {
                font-size: 22px;
                font-weight: 300;
            }

            main .jumbo {
                width: 100%;
                height: 400px;
                /*background: url(http://cine.nl/wp-content/uploads/2015/07/the-revenant-trailer.jpg) center center no-repeat;*/
                /*background-size: cover;*/
            }
            main .icons {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: justify;
                -ms-flex-pack: justify;
                justify-content: space-between;
            }
            main .icons .big-icon {
                width: 180px;
                height: 180px;
                /*background: url(http://simplyleonardodicaprio.com/wp-content/uploads/leo-1.jpg) center top;
                background-size: 140%;*/
                border-radius: 50%;
                border: 2px solid white;
                margin-top: -90px;
                overflow: hidden;
                margin-left: -60px;
            }
            main .icons .big-icon img {
                max-width: 100%;
            }
            main .icons .rate {
                width: 125px;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: justify;
                -ms-flex-pack: justify;
                justify-content: space-between;
                -webkit-box-ordinal-group: 0;
                -ms-flex-order: -1;
                order: -1;
            }
            main .icons .rate .star-btn {
                margin-top: -27.5px;
            }
            main .icons .rate .star-btn i {
                font-size: 26px;
            }
            main .icons .rate .like-btn {
                margin-top: -27.5px;
            }
            main .icons .rate .like-btn i {
                font-size: 22px;
            }
            main .icons .add {
                width: 125px;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: end;
                -ms-flex-pack: end;
                justify-content: flex-end;
            }
            main .icons .add .add-btn {
                margin-top: -27.5px;
            }
            main .icons .add .add-btn i {
                font-size: 28px;
            }
            main .details {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
                margin-bottom: 50px;
            }
            main .details h3 {
                color: #212121;
                font-size: 28px;
                margin-top: 15px;
            }
            main .details p {
                color: #727272;
                margin-top: 0px;
            }
            main .bio {
                margin-bottom: 80px;
            }
            main .bio .title h6 {
                color: #212121;
                font-size: 18px;
            }
            main .bio .content p {
                color: #727272;
            }
            main .pics {
                margin-bottom: 50px;
            }
            main .pics .title {
                margin-bottom: 20px;
            }
            main .pics .title h6 {
                color: #212121;
                font-size: 18px;
            }
            main .pics .row-1 .s12:nth-of-type(2) {
                margin-bottom: -10px;
            }
            main .pics .row .s12:nth-of-type(1) {
                margin-bottom: 10px;
            }
            main .pics .row .col .card {
                height: 260px;
            }
            main .pics .row .col .card #first-img {
                height: 100%;
                background: url(http://www.wallpapers.rs/wallpapers/leonardo_dicaprio_in_movie_scene-1920x1200.jpg) center center;
                background-size: cover;
            }
            main .pics .row .col .card #second-img {
                height: 100%;
                background: url(http://tremendouswallpapers.com/wp-content/uploads/2014/12/django-calvin-candie-leonardo-dicaprio-gives-the-hammer-in-movie-274680.jpg) center center;
                background-size: cover;
            }
            main .pics .row .col .card #third-img {
                height: 100%;
                background: url(http://cdn.collider.com/wp-content/uploads/leonardo-dicaprio-wolf-of-wall-street.jpg) center center;
                background-size: cover;
            }
            main .pics .row .col .card #forth-img {
                height: 100%;
                background: url(http://www.aceshowbiz.com/images/still/the-great-gatsby-still09.jpg) center center;
                background-size: cover;
            }
            main .posts {
                margin-bottom: 50px;
            }
            main .posts .title h6 {
                color: #212121;
                font-size: 18px;
                margin-bottom: 20px;
            }
            main .posts .row {
                margin-bottom: 0px;
            }
            main .posts .row .col .card {
                position: relative;
            }
            main .posts .row .col .card .card-action {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-pack: justify;
                -ms-flex-pack: justify;
                justify-content: space-between;
                -webkit-box-align: center;
                -ms-flex-align: center;
                align-items: center;
            }
            main .posts .row .col .card .card-action .tags {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
            }
            main .posts .row .col .card .card-action .tags .chip:first-child {
                margin-right: 5px;
            }
            main .posts .row .col .card .card-action .card-love {
                cursor: pointer;
                font-size: 25px;
                position: absolute;
                right: 10px;
                top: 10px;
                color: white;
                -webkit-transition: all 100ms ease-in-out;
                transition: all 100ms ease-in-out;
            }
            main .posts .row .col .card .card-action .card-love:hover {
                color: #f9a825;
            }
            main .blogs {
                margin-bottom: 80px;
            }
            main .blogs .title {
                margin-bottom: 20px;
            }
            main .blogs .title h6 {
                color: #212121;
                font-size: 18px;
            }
            main .likes .title {
                margin-bottom: 20px;
            }
            main .likes .title h6 {
                color: #212121;
                font-size: 18px;
            }
            main .likes .row .col .tabs {
                margin-bottom: 10px;
                box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12);
            }
            main .stretch {
                height: 500px;
            }
            main .fab {
                -webkit-transition: all 120ms ease-in-out;
                transition: all 120ms ease-in-out;
                bottom: 20px !important;
            }
            main .fab .btn-large i {
                font-size: 40px;
            }
            main .fab .orange i {
                font-size: 20px;
            }

            @media screen and (max-width: 600px) {
                main {
                    padding-top: 40px;
                }

                .jumbo {
                    height: 200px !important;
                }

                .icons {
                    -webkit-box-pack: center !important;
                    -ms-flex-pack: center !important;
                    justify-content: center !important;
                }

                .rate {
                    display: none !important;
                }

                .add {
                    display: none !important;
                }
                .edit-profile {
                    display:none !important;
                }
                main .icons .big-icon {
                    margin-left: 0px;
                }
            }
            @media screen and (min-width: 600px) {
                .fab {
                    display: none;
                }
            }
        </style>
        <div class="jumbo parallax-container">
            <div class="parallax">
                <img src="http://cine.nl/wp-content/uploads/2015/07/the-revenant-trailer.jpg" style="display: block; transform: translate3d(-50%, 457px, 0px);">
            </div>
        </div>
        <div class="container icons">
            <div class="big-icon"><img src="<?php echo $user['avatar'] ?>" /></div>
            <div class="rate">
                <a class="star-btn add-btn btn-floating btn-large waves-effect waves-light blue darken-1"><i class="material-icons">star</i></a>
                <a class="like-btn add-btn btn-floating btn-large waves-effect waves-light blue darken-1" title="J'aime"><i class="material-icons">thumb_up</i></a>
            </div>
            <div class="fixed-action-btn horizontal click-to-toggle edit-profile" style="position: relative;">
                <a class="btn-floating btn-large red">
                    <i class="material-icons">create</i>
                </a>
                <ul>
                    <li><a class="btn-floating red tooltipped" data-position="bottom" data-delay="50" data-tooltip="Modifier votre image de mur"><i class="material-icons">airplay</i></a></li>
                    <li><a href="#modal_edit_desc" class="btn-floating yellow darken-1 tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Modifier votre biographie"><i class="material-icons">format_quote</i></a></li>
                    <li><a href="#modal_edit_avatar" class="btn-floating green tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Modifier votre avatar"><i class="material-icons">image</i></a></li>
                    <li><a href="#modal_edit_user_infos" class="btn-floating blue tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Modifier vos informations"><i class="material-icons">person_pin</i></a></li>
                </ul>
            </div>
        </div>
        <div class="details">
            <h3><?php echo $user['display_name'] ?></h3>
            <p>Actor / Environmentalist</p>
        </div>
        <div class="container description-container bio">
            <div class="title">
                <h6>Description</h6>
            </div>
            <div class="content">
                <p><?php echo $user['description'] ?></p>
            </div>
            <hr />
        </div>
        <div class="container posts">
            <div class="title">
                <h6>Blagues postées</h6>
            </div>
            <?php
            $count = 1;
            if (isset($jokes) && !empty($jokes)){
                foreach ($jokes as $joke_index => $joke){
                    if ($count % 2 == 1){
                        ?>
                        <div class="row">
                            <?php
                        }
                        ?>
                        <div class="col s12 m6">
                            <div class="card blue-grey">
                                <div class="card-content white-text">
                                    <span class="card-title"><?php echo $joke['title']; ?></span>
                                    <p><?php echo $joke['excerpt']; ?></p>
                                </div>
                                <div class="card-action">
                                    <a href="#">Voir la blague</a>
                                    <div class="tags">
                                        <div class="chip">
                                            Story
                                        </div>
                                        <div class="chip">
                                            Adventure
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if ($count % 2 || $count == sizeof($jokes)){
                            ?>
                        </div>
                        <?php
                    }
                    $count++;
                }
            }

            ?>
        </div>

        <div class="container likes">
            <div class="title">
                <h6>Ce que vous avez aimez</h6>
            </div>
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s3"><a href="#test2">Utilisateurs</a></li>
                        <li class="tab col s3"><a href="#test3">Blagues</a></li>
                    </ul>
                </div>
                <div id="test2" class="col s12">
                    <ul class="collection">
                        <li class="collection-item avatar">
                            <img src="https://www.mautic.org/media/images/default_avatar.png" alt="" class="circle">
                            <span class="title">Jean-Pierre Ruchon</span>
                            <p>37 blagues<br>
                                <a href="#">Voir son profil</a>
                            </p>
                            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                        </li>
                        <li class="collection-item avatar">
                            <img src="https://www.mautic.org/media/images/default_avatar.png" alt="" class="circle">
                            <span class="title">Benoit Merlot</span>
                            <p>2 blagues<br>
                                <a href="#">Voir son profil</a>
                            </p>
                            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                        </li>
                        <li class="collection-item avatar">
                            <img src="https://www.mautic.org/media/images/default_avatar.png" alt="" class="circle">
                            <span class="title">Romain Berignot</span>
                            <p>1 blague<br>
                                <a href="#">Voir son profil</a>
                            </p>
                            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                        </li>
                        <li class="collection-item avatar">
                            <img src="https://www.mautic.org/media/images/default_avatar.png" alt="" class="circle">
                            <span class="title">Sam Smith</span>
                            <p>28 blagues<br>
                                <a href="#">Voir son profil</a>
                            </p>
                            <a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>
                        </li>
                    </ul>
                </div>
                <div id="test3" class="col s12">
                    <div class="row">
                        <div class="col s12 m6">
                            <div class="card blue-grey">
                                <div class="card-content white-text">
                                    <span class="card-title">Post title</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem aliquid nobis nesciunt nulla laudantium aspernatur, delectus sed, minus ex perspiciatis...</p>
                                </div>
                                <div class="card-action">
                                    <a href="#">Read more...</a>
                                    <div class="tags">
                                        <div class="chip">
                                            Story
                                        </div>
                                        <div class="chip">
                                            Adventure
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="card blue-grey">
                                <div class="card-content white-text">
                                    <span class="card-title">Post title</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem aliquid nobis nesciunt nulla laudantium aspernatur, delectus sed, minus ex perspiciatis...</p>
                                </div>
                                <div class="card-action">
                                    <a href="#">Read more...</a>
                                    <div class="tags">
                                        <div class="chip">
                                            Story
                                        </div>
                                        <div class="chip">
                                            Adventure
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m6">
                            <div class="card blue-grey">
                                <div class="card-content white-text">
                                    <span class="card-title">Post title</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem aliquid nobis nesciunt nulla laudantium aspernatur, delectus sed, minus ex perspiciatis...</p>
                                </div>
                                <div class="card-action">
                                    <a href="#">Read more...</a>
                                    <div class="tags">
                                        <div class="chip">
                                            Story
                                        </div>
                                        <div class="chip">
                                            Adventure
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col s12 m6">
                            <div class="card blue-grey">
                                <div class="card-content white-text">
                                    <span class="card-title">Post title</span>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem aliquid nobis nesciunt nulla laudantium aspernatur, delectus sed, minus ex perspiciatis...</p>
                                </div>
                                <div class="card-action">
                                    <a href="#">Read more...</a>
                                    <div class="tags">
                                        <div class="chip">
                                            Story
                                        </div>
                                        <div class="chip">
                                            Adventure
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="fixed-action-btn fab" style="bottom: 45px; right: 24px;">
            <a class="btn-floating btn-large red">
                <i class="large material-icons">arrow_drop_up</i>
            </a>
            <ul>
                <li><a class="btn-floating red tooltipped" data-position="bottom" data-delay="50" data-tooltip="Modifier votre image de mur"><i class="material-icons">airplay</i></a></li>
                <li><a class="btn-floating yellow darken-1 tooltipped" data-position="bottom" data-delay="50" data-tooltip="Modifier votre biographie"><i class="material-icons">format_quote</i></a></li>
                <li><a href="#modal_edit_avatar" class="btn-floating green tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Modifier votre avatar"><i class="material-icons">image</i></a></li>
                <li><a href="#modal_edit_user_infos" class="btn-floating blue tooltipped modal-trigger" data-position="bottom" data-delay="50" data-tooltip="Modifier vos informations"><i class="material-icons">person_pin</i></a></li>
            </ul>
        </div>

        <?php $this->modal_edit_avatar($user); ?>
        <?php $this->modal_edit_user_infos($user); ?>
        <?php $this->modal_edit_desc($user); ?>
        <script>
        $(document).ready(function(){
            $('.jumbo .parallax').parallax();
            $('.modal').modal();
            jQuery('.big-icon img').change(function(){
                if (jQuery('.big-icon img').prop('naturalHeight') < jQuery('.big-icon img').prop('naturalWidth')){
                    jQuery('.big-icon img').removeClass('autoHeight').addClass('autoWidth');
                }
                else {
                    jQuery('.big-icon img').removeClass('autoWidth').addClass('autoHeight');
                }
            });
        });
        </script>
        <?php
    }

    public function modal_edit_desc($user){
        ?>
        <!-- Modal Structure -->
        <div id="modal_edit_desc" class="modal">
            <div class="modal-content center-align">
                <div class="row">
                    <p>Decrivez-vous en quelques mots, mettez votre meilleur blague... Cette description sera visible par tous sur votre profil.</p>
                </div>
                <div class="row">
                   <form class="col s12">
                     <div class="row">
                       <div class="input-field col s12">
                         <textarea id="desc-textarea" class="materialize-textarea" default="<?php echo $user['description']; ?>"><?php echo $user['description']; ?></textarea>
                         <label for="textarea1">Votre description</label>
                       </div>
                     </div>
                   </form>
                 </div>
                <button id="desc-submit" class="btn waves-effect waves-light" type="submit" disabled name="action" onclick='changeDesc(this)'>Sauvegarder les changements
                    <i class="material-icons right">send</i>
                </button>
                <div class="description-progress progress" style="display:none;">
                     <div class="indeterminate"></div>
                 </div>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Fermer</a>
            </div>
        </div>
        <script type="text/javascript">
            $('#desc-textarea').trigger('autoresize');
            $('#desc-textarea').bind('input propertychange', function() {
                if (jQuery(this).val() != jQuery(this).attr('default')){
                    jQuery('#desc-submit').prop('disabled', false);
                }
                else {
                    jQuery('#desc-submit').prop('disabled', true);
                }
            });
            function changeDesc(clicked){
                if (jQuery('#desc-submit').prop('disabled') == false){
                    var description = jQuery('#desc-textarea').val();
                    var ajax = $.ajax({
                        url: ajaxurl,
                        data: {
                            from: <?php echo "'".$this->user_object->user_role."'"; ?>,
                            action: 'update_own_description',
                            description : description,
                        },
                        type: 'POST',
                        dataType : 'json',
                        beforeSend: function (jqXHR, settings) {
                            url = settings.url + "?" + settings.data;
                            console.log(url);
                            jQuery('.description-progress').show();
                        },
                        error: function (thrownError) {
                            console.log(thrownError);
                            alert(thrownError.responseText);
                        },
                        complete: function () {
                            jQuery('.description-progress').hide();
                        },
                        success: function (data, status) {
                            if ( data.success){
                                Materialize.toast(data.message, 4000);
                                jQuery('.description-container .content').text(description);
                                $('#desc-textarea').attr('default', description);
                                jQuery('#desc-submit').prop('disabled', true);
                            }
                            else {
                                Materialize.toast(data.message, 4000);
                            }
                        }
                    });
                }
            }
        </script>
        <?php
    }

    public function modal_edit_avatar($user){

        if (array_key_exists('REQUEST_SCHEME', $_SERVER)) {
          $cors_location = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] .
            dirname($_SERVER["SCRIPT_NAME"]) . "/cloudinary_cors.html";
        } else {
          $cors_location = "http://" . $_SERVER["HTTP_HOST"] . "/cloudinary_cors.html";
        }

        ?>
        <style>
            #avatar-preview {
                width: 120px;
                height: 120px;
                border-radius: 50%;
                border: 2px solid white;
                overflow: hidden;
                padding:0px;
            }
        </style>
        <!-- Modal Structure -->
        <div id="modal_edit_avatar" class="modal">
            <div class="modal-content center-align">
                <div class="row">
                    <span id="avatar-preview" class="col m2 offset-m5 circle z-depth-5">
                        <img width="100%" height='auto' src="<?php echo $user['avatar']; ?>" alt="" class="">
                    </span>
                </div>
                <div class="file-field input-field">
                    <div class="btn">
                        <span>File</span>
                        <?php echo cl_image_upload_tag('image_id', array("callback" => $cors_location)); ?>
                    </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text" placeholder="Modifier votre avatar">
                    </div>
                </div>

                <div class="avatar-progress progress" style="display:none;">
                     <div class="determinate" style="width: 0%"></div>
                 </div>
                <button id="avatar-submit" class="btn waves-effect waves-light" type="submit" disabled name="action" onclick="changeAvatar()">Changer d'avatar
                    <i class="material-icons right">send</i>
                </button>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Fermer</a>
            </div>
        </div>
        <?php echo cloudinary_js_config(); ?>
        <script type="text/javascript">
            $(function() {
              if($.fn.cloudinary_fileupload !== undefined) {
                $("input.cloudinary-fileupload[type=file]").cloudinary_fileupload();
              }
            });

            $('.cloudinary-fileupload').bind('fileuploadprogress', function(e, data) {
              $('.avatar-progress').show();
              $('.avatar-progress .determinate').css('width', Math.round((data.loaded * 100.0) / data.total) + '%');
            });

            $('.cloudinary-fileupload').bind('cloudinarydone', function(e, data) {
                jQuery('#avatar-submit').prop('disabled', false);
                var dataURL = data.result.url;
                jQuery('#avatar-preview img').attr('src', dataURL);
                if (jQuery('#avatar-preview img').prop('naturalHeight') < jQuery('#avatar-preview img').prop('naturalWidth')){
                    jQuery('#avatar-preview img').removeClass('autoHeight').addClass('autoWidth');
                }
                else {
                    jQuery('#avatar-preview img').removeClass('autoWidth').addClass('autoHeight');
                }
              return true;
            });
            function changeAvatar(){
                if (jQuery('#avatar-preview img').attr('src')){
                     var ajax = $.ajax({
                         url: ajaxurl,
                         data: {
                             from: <?php echo "'".$this->user_object->user_role."'"; ?>,
                             action: 'update_own_avatar',
                             avatar : jQuery('#avatar-preview img').attr('src'),
                         },
                         type: 'POST',
                         dataType : 'json',
                         beforeSend: function (jqXHR, settings) {
                             url = settings.url + "?" + settings.data;
                             console.log(url);
                         },
                         error: function (thrownError) {
                             console.log(thrownError);
                             alert(thrownError.responseText);
                         },
                         complete: function () {
                         },
                         success: function (data, status) {
                             if ( data.success){
                                 Materialize.toast(data.message, 4000);
                                 jQuery('input[type="file"]').val('');
                                 jQuery('.big-icon img').attr('src', jQuery('#avatar-preview img').attr('src'));
                                 jQuery('#avatar-submit').prop('disabled', true);
                                 $('.avatar-progress').hide();
                             }
                             else {
                                 Materialize.toast(data.message, 4000);
                             }
                         }
                     });
                 }
            }
        </script>
        <?php
    }

    public function modal_edit_user_infos($user){
        ?>
        <style>
        .input-field div.input-error {
            position: relative;
            top: -1rem;
            left: 0rem;
            font-size: 0.8rem;
            color: #FF4081;
            -webkit-transform: translateY(0%);
            -ms-transform: translateY(0%);
            -o-transform: translateY(0%);
            transform: translateY(0%);
        }
        </style>
        <!-- Modal Structure -->
        <div id="modal_edit_user_infos" class="modal">
            <div class="modal-content center-align">
                <form id="test">
                    <div class="row">
                        <div class="input-field col m6 offset-m3 s12">
                          <input type='hidden' name='user_id' id='user_id' value='<?php echo $user['id']; ?>'/>
                          <input type="text" id="username" disabled name="username" value="<?php echo $user['username']; ?>" class="validate" />
                          <label for="username">Nom d'utilisateur</label>
                        </div>

                        <div class="input-field col m6 offset-m3 s12">
                          <input id="email" type="email" name="email" value="<?php echo $user['email']; ?>" class="validate" />
                          <label for="email">Adresse email</label>
                        </div>

                        <div class="input-field col m6 offset-m3 s12">
                          <input id="new_password" type="password" name="new_password" value="" class="validate" />
                          <label for="new_password">Nouveau mot de passe</label>
                        </div>
                        <div class="input-field col m6 offset-m3 s12">
                          <input id="new_password_repeat" type="password" name="new_password_repeat" value="" class="validate" />
                          <label for="new_password_repeat">Répétition du mot de passe</label>
                        </div>

                        <div class="divider col m12"></div>

                        <div class="input-field col m6 offset-m3 s12">
                          <input id="password" type="password" name="new_password_repeat" value="" class="validate" />
                          <label for="password">Entrez votre mot de passe (*)</label>
                          <i>(*) Votre mot de passe est requis pour tout changement sur votre profil.</i>
                        </div>

                        <div class="divider col m12"></div>
                    </div>
                </form>

                <button class="btn waves-effect waves-light" type="submit" name="action" onclick="save_user_infos_change()">Sauvegarder les changements
                    <i class="material-icons right">send</i>
                </button>
            </div>
            <div class="modal-footer">
                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Fermer</a>
            </div>
        </div>
        <script type="text/javascript">
        var form_validation = {
            rules: {
                user_id: {
                    required: true,
                },
                username: {
                    required: true,
                },
                password: {
    				required: true,
    			},
    			new_password: {
    				required: false,
    				minlength: 5,
    			},
    			new_password_repeat: {
                    required: false,
                    minlength: 5,
                    equalTo: "#new_password"
                },
                email: {
                    required: true,
                    minlength: 5,
                    email: true,
                },
            },
            //For custom messages
            messages: {
                password:{
                    required: "Veuillez entrer votre mot de passe avant de continuer",
                },
                new_password: {
    				minlength: "Ce champ doit faire au moins 5 caractères.",
    			},
                new_password_repeat: {
    				equalTo: "Les deux mots de passe doivent être identiques.",
    			},
                default : {
                    equalTo: "DEFAULT Les deux mots de passe doivent être identiques.",
                    required: "DEFAULT Ce champ est requis",
                    minlength: "Ce champs ne respecte pas la taille minimale.",
                    email: "Veuillez entrer une adresse email valide.",
                }
            },
        }


        function save_user_infos_change(){
            var data = new Object();
            data.user_id = jQuery('#modal_edit_user_infos #user_id').val();
            data.user_name = jQuery('#modal_edit_user_infos #username').val();
            data.email = jQuery('#modal_edit_user_infos #email').val();
            data.new_password = jQuery('#modal_edit_user_infos #new_password').val();
            data.new_password_repeat = jQuery('#modal_edit_user_infos #new_password_repeat').val();
            data.password = jQuery('#modal_edit_user_infos #password').val();
            if (validate_form('#modal_edit_user_infos', form_validation)){
                var ajax = $.ajax({
                    url: ajaxurl,
                    data: {
                        from: <?php echo "'".$this->user_object->user_role."'"; ?>,
                        action: 'update_own_infos',
                        data : data,
                    },
                    type: 'POST',
                    dataType : 'json',
                    beforeSend: function (jqXHR, settings) {
                        url = settings.url + "?" + settings.data;
                        console.log(url);
                    },
                    error: function (thrownError) {
                        console.log(thrownError);
                        alert(thrownError.responseText);
                    },
                    complete: function () {
                    },
                    success: function (data, status) {
                        console.log(data);
                        if ( data.success){
                            Materialize.toast(data.message, 4000);
                            jQuery('#modal_edit_user_infos #new_password').val('');
                            jQuery('#modal_edit_user_infos #new_password_repeat').val('');
                            jQuery('#modal_edit_user_infos #password').val('');
                        }
                        else {
                            Materialize.toast(data.message, 4000);
                        }
                    }
                });
            }
        }
        </script>
        <?php
    }

}
?>

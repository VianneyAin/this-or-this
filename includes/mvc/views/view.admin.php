<?php
class Admin_View {
    public function admin_dashboard_view($data){
        ?>
        <div class="container">
            <div class="section facts">
                <h2 class="header indigo-text lighten-1 section-title">
                    <span><i class="material-icons">insert_chart</i>Dashboard Administration</span>
                </h2>

                <div class="row">
                    <div class="col s12 m3">
                        <a href="http://localhost/jokes/admin/blagues">
                            <div class="card pink accent-3">
                                <div class="card-content white-text">
                                    <i class="material-icons">playlist_add_check</i>
                                    <span class="card-title">Gérer les nouvelles blagues</span>
                                    <p class="bounceEffect animated bounceIn">
                                        <?php echo sizeof($data); ?> blagues à traiter
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col s12 m3">
                        <a href="http://localhost/jokes/admin/blagues">
                            <div class="card pink accent-3">
                                <div class="card-content white-text">
                                    <i class="material-icons">library_books</i>
                                    <span class="card-title">Voir toutes les blagues</span>
                                    <p class="bounceEffect animated bounceIn">
                                        X blagues au total
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col s12 m3">
                        <a href="http://localhost/jokes/admin/blagues">
                            <div class="card pink accent-3">
                                <div class="card-content white-text">
                                    <i class="material-icons">group</i>
                                    <span class="card-title">Voir tous les utilisateurs</span>
                                    <p class="bounceEffect animated bounceIn">
                                        X utilisateurs au total
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <?php
    }

    public function admin_navbar_view(){
        ?>
        <div class="container">
            <div class="section">
                <a href="http://localhost/jokes/admin" class="waves-effect waves-light btn orange">Retour au dashboard</a>
            </div>
        </div>

        <?php
    }

    public function manage_draft_jokes_view($data){
        ?>
        <div class="container">
            <?php
            if (isset($data['jokes']) && !empty($data['jokes'])){
                foreach ($data['jokes'] as $key => $joke){
                    ?>
                    <div class="section">
                        <div class="card joke" id="<?php echo $joke['id']; ?>">
                            <div class="card-header">
                                <div class="chip">
                                    <img src="<?php echo $joke['author']['avatar']; ?>" alt="Avatar">
                                    <?php echo $joke['author']['display_name']; ?>
                                </div>
                                <div class="chip">
                                    <?php echo $joke['created']; ?>
                                </div>
                                <div class="chip">
                                    <?php echo $joke['status']; ?>
                                </div>
                            </div>
                            <div class="card-content">
                                <i class="material-icons right blue-text" style="cursor:pointer;" onclick="edit_joke(this)">edit</i></span>
                                <span class="card-title grey-text text-darken-4 joke-title">
                                    <?php echo $joke['title']; ?>
                                </span>
                                <div class="card-content-content joke-content">
                                    <?php echo $joke['content']; ?>
                                </div>
                                <div class="joke-category"></div>
                            </div>
                            <div class="card-action">
                                <span class="admin-action">
                                    <a class="valid-joke waves-effect waves-light btn blue" onclick="valid_joke(this)" data-status="active">
                                        <i class="material-icons right">done</i>Valider
                                    </a>
                                    <a class="waves-effect waves-light btn yellow" onclick="valid_joke(this)" data-status="archive">
                                        <i class="material-icons right">archive</i>Archiver
                                    </a>
                                    <a class="waves-effect waves-light btn red" onclick="remove_joke(this)">
                                        <i class="material-icons right">not_interested</i>Supprimer
                                    </a>
                                </span>
                                <span class="edit-action" style="display:none;">
                                    <a class="valid_edit waves-effect waves-light btn blue" onclick="valid_edit(this)" data-status="active">
                                        <i class="material-icons right">done</i>Valider la modification
                                    </a>
                                    <a class="cancel_edit waves-effect waves-light btn red" onclick="cancel_edit(this)" data-status="actived">
                                        <i class="material-icons right">not_interested</i>Annuler la modification
                                    </a>
                                </span>
                            </div>
                            <div class="card-reveal">

                            </div>
                        </div>
                    </div>
                    <?php
                }
            }
            else {
                ?>
                <h4>Il ne reste plus aucune blague à moderer.</h4>
                <?php
            } ?>
        </div>
        <script type="text/javascript">
            var array_categories = [];
            <?php

            if ($data['categories'] != null){
                foreach ($data['categories'] as $key => $category){?>
                    var category = new Object();
                    category.id = "<?php echo $category['id'];  ?>";
                    category.name = "<?php echo $category['name']; ?>";
                    array_categories.push(category);
                <?php }
            }?>
            jQuery(document).ready(function(){
                jQuery('.joke').each(function(){
                    if (jQuery(this).find('.joke-title').text().trim() == '' || jQuery(this).find('.joke-content').text().trim() == ''){
                        jQuery(this).find('.valid-joke').first().attr('disabled','disabled');
                    }
                });
            });

            function check_valid(element){
                if (element.find('.joke-title').text().trim() != '' && element.find('.joke-content').text().trim() != ''){
                    element.find('.valid-joke').first().removeAttr('disabled');
                }
                else {
                    element.find('.valid-joke').first().attr('disabled','disabled');
                }
            }

            var cache = [];

            /** FUNCTION TO HANDLE THE CACHE FOR EDITING JOKES **/
            var getByAttr = function(arr, attr, value){
                var i = arr.length;
                while(i--){
                   if( arr[i]
                       && arr[i].hasOwnProperty(attr)
                       && (arguments.length > 2 && arr[i][attr] === value ) ){

                       return arr[i];

                   }
                }
                return arr;
            }
            var removeByAttr = function(arr, attr, value){
                var i = arr.length;
                while(i--){
                   if( arr[i]
                       && arr[i].hasOwnProperty(attr)
                       && (arguments.length > 2 && arr[i][attr] === value ) ){

                       arr.splice(i,1);

                   }
                }
                return arr;
            }

            /** FUNCTION TO HANDLE THE EDITING OF JOKES **/
            function edit_joke(clicked){
                var element = jQuery(clicked).closest('.card');
                if (!jQuery(element).hasClass('edited')){
                    var title = jQuery(element).find('.joke-title').text().trim();
                    var content = jQuery(element).find('.joke-content').text().trim();
                    var data = new Object();
                    data.id = jQuery(element).attr('id');
                    data.title = title;
                    data.content = content;
                    cache.push(data);
                    jQuery(element).find('.joke-title').html('<input type="text" placeholder="Proposer un titre" value="'+title+'" />');
                    jQuery(element).find('.joke-content').html('<textarea class="materialize-textarea type="text" placeholder="Proposer un titre">'+content+'</textarea>');
                    jQuery(element).find('.joke-category').html('<div class="input-field col s12"><select multiple class="select-category"><option value="" disabled>Choix de catégories</option></select><label>Catégories : </label></div>');
                    $.each(array_categories, function(index, value){
                        jQuery(element).find('.joke-category select').append('<option value="'+value.id+'">'+value.name+'</option>');
                    });

                    $('select').material_select();
                    jQuery(element).find('textarea').trigger('autoresize');
                    jQuery(element).find('.edit-action').show();
                    jQuery(element).find('.admin-action').hide();
                    jQuery(element).addClass('edited');
                }
            }

            function valid_edit(clicked){
                var element = jQuery(clicked).closest('.card');
                if (jQuery(element).hasClass('edited')){
                    var title = jQuery(element).find('.joke-title input').val().trim();
                    var content = jQuery(element).find('.joke-content textarea').text().trim();
                    jQuery(element).find('.joke-title').html(title);
                    jQuery(element).find('.joke-content').html(content);
                    jQuery(element).find('.edit-action').hide();
                    jQuery(element).find('.admin-action').show();
                    jQuery(element).find('.card-header .badge').each(function(){
                        jQuery(this).remove();
                    });
                    jQuery(element).find('.joke-category select option:selected').each(function(){
                        jQuery(element).find('.card-header').append('<span class="new badge" data-badge-id="'+jQuery(this).val()+'" data-badge-caption="'+jQuery(this).text()+'"></span>');
                    });
                    jQuery(element).find('.joke-category').empty();
                    removeByAttr(cache, 'id', jQuery(element).attr('id'));
                    jQuery(element).removeClass('edited');
                    check_valid(element);
                }
            }

            function cancel_edit(clicked){
                var element = jQuery(clicked).closest('.card');
                if (jQuery(element).hasClass('edited')){
                    var data = getByAttr(cache, 'id', jQuery(element).attr('id'));
                    jQuery(element).find('.joke-title').html(data.title);
                    jQuery(element).find('.joke-content').html(data.content);
                    jQuery(element).find('.joke-category').empty();
                    jQuery(element).find('.edit-action').hide();
                    jQuery(element).find('.admin-action').show();
                    removeByAttr(cache, 'id', jQuery(element).attr('id'));
                    jQuery(element).removeClass('edited');
                }
            }

            function valid_joke(clicked){
                var status = jQuery(clicked).attr('data-status');
                var id = jQuery(clicked).closest('.card').attr('id');
                var element = jQuery(clicked).closest('.card');
                var title = jQuery(element).find('.joke-title').text().trim();
                var content = jQuery(element).find('.joke-content').text().trim();

                var element_categories = [];
                jQuery(element).find('.card-header .badge').each(function(){
                    element_categories.push(jQuery(this).attr('data-badge-id'));
                });
                var ajax = $.ajax({
                    url: ajaxurl,
                    data: {
                        from: 'admin',
                        action: 'valid_joke',
                        id : id,
                        status: status,
                        title: title,
                        content: content,
                        categories: element_categories,
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
                            var $toastContent = $('<span>'+data.message+'</span>').add($('<button class="btn-flat toast-action" data-action="valid_joke" data-status="draft" data-target='+id+' onclick="undo(this)">Undo</button>'));
                            Materialize.toast($toastContent, 4000);
                            jQuery(element).fadeOut( "slow", function() {
                            });
                        }
                        else {
                            Materialize.toast(data.message, 4000);
                        }
                    }
                });
            }

            function undo(clicked){
                var target = jQuery(clicked).attr('data-target');
                var status = jQuery(clicked).attr('data-status');
                var action = jQuery(clicked).attr('data-action');
                var id = target;
                var element = jQuery('#'+id);
                var title = jQuery(element).find('.joke-title').text().trim();
                var content = jQuery(element).find('.joke-content').text().trim();
                var ajax = $.ajax({
                    url: ajaxurl,
                    data: {
                        from: 'admin',
                        action: action,
                        id : id,
                        status: status,
                        title: title,
                        content: content,
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
                            Materialize.toast('Action annulée.', 4000);
                            jQuery('#'+id).fadeIn( "slow", function() {

                            });
                            jQuery(clicked).parent().remove();
                        }
                        else {
                            alert(data.message);
                        }
                    }
                });
            }

            function remove_joke(clicked){
                var id = jQuery(clicked).closest('.card').attr('id');
                var element = jQuery(clicked).closest('.card');
                var ajax = $.ajax({
                    url: ajaxurl,
                    data: {
                        from: 'admin',
                        action: 'delete_joke',
                        id : id,
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
                            jQuery(element).fadeOut( "slow", function() {
                                // Animation complete.
                            });
                        }
                        else {
                            Materialize.toast(data.message, 4000);
                        }
                    }
                });
            }
        </script>
        <?php
    }


}
?>

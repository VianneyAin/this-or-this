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

    public function manage_jokes_view($data){
        ?>
        <div class="container">
            <?php
            if (isset($data) && !empty($data)){
                foreach ($data as $key => $joke){
                    ?>
                    <div class="section">
                        <div class="card" id="<?php echo $joke['id']; ?>">
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
                                <span class="new badge" data-badge-caption="Blague courte"></span>
                                <span class="new badge red" data-badge-caption="Blague raciste"></span>
                            </div>
                            <div class="card-content">
                                <span class="card-title grey-text text-darken-4"><?php echo $joke['title']; ?></span>
                                <div class="card-content-content">
                                    <?php echo $joke['content']; ?>
                                </div>
                            </div>
                            <div class="card-action">
                                <button class="btn btn-floating waves-effect waves-light blue" onclick="valid_jokes(this)" data-status="active">
                                    <i class="material-icons right">done</i>
                                </button>
                                <button class="btn btn-floating waves-effect waves-light red" data-status="archived">
                                    <i class="material-icons right">not_interested</i>
                                </button>
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
        function valid_jokes(clicked){
            var status = jQuery(clicked).attr('data-status');
            var id = jQuery(clicked).closest('.card').attr('id');
            var element = jQuery(clicked).closest('.card');
            var ajax = $.ajax({
                url: ajaxurl,
                data: {
                    from: 'admin',
                    action: 'update_jokes_status',
                    id : id,
                    status: status,
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
                        alert(data.message);
                        jQuery(element).fadeOut( "slow", function() {
                            // Animation complete.
                        });
                    }
                    else {
                        alert(data.message);
                    }
                }
            });
        }
        </script>
        <?php
    }


}
?>

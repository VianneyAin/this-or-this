<?php
class Footer_Controller {

    public function __construct(){
        // we need the model to query the database later in the controller
        require_once(dirname(__FILE__).'/../models/model.footer.php');
        require_once(dirname(__FILE__).'/../views/view.footer.php');
        $this->model = new Footer_Model();
        $this->view = new Footer_View();
    }

    public function layout_request() {

    }

    public function partials_request() {
        $this->view->fn_footer_view();
    }
}
?>

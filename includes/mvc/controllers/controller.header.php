<?php
class Header_Controller {

    public function __construct(){
        // we need the model to query the database later in the controller
        require_once(dirname(__FILE__).'/../models/model.header.php');
        require_once(dirname(__FILE__).'/../views/view.header.php');
        $this->model = new Header_Model();
        $this->view = new Header_View();
    }

    public function layout_request() {

    }

    public function partials_request() {
        $this->view->fn_header_view();
    }
}
?>

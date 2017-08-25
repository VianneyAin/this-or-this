<?php
class Error_Controller {

    public function __construct(){
        require_once(dirname(__FILE__).'/../views/view.error.php');
        $this->view = new Error_View();
    }

    public function layout_request() {

    }

    public function partials_request() {
        $this->view->fn_error_view();
    }
}
?>

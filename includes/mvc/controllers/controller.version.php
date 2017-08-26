<?php
class Version_Controller {

    public function __construct(){
        require_once(dirname(__FILE__).'/../views/view.version.php');
        $this->view = new Version_View();
    }

    public function layout_request() {

    }

    public function partials_request() {
        $this->view->display_version_view();
    }
}
?>

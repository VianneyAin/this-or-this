<?php
class Logout_Controller extends Application {

    public function __construct(){
        parent::__construct();//get parent's variables
        require_once(dirname(__FILE__).'/../views/view.logout.php');
        $this->view = new Logout_View();
    }

    public function layout_request() {

    }

    public function partials_request() {
        $this->view->fn_logout_view($this->registration);
    }
}
?>

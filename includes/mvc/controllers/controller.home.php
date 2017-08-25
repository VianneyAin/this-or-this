<?php
class Home_Controller{

    public function __construct(){
        require_once(dirname(__FILE__).'/../views/view.home.php');
        $this->view = new Home_View();
    }

    public function layout_request() {

    }

    public function partials_request() {
        $this->view->fn_home_view();
    }
}
?>

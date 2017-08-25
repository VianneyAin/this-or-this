<?php
class Login_Controller extends Application {

    public function __construct(){
        parent::__construct();//get parent's variables
        require_once(dirname(__FILE__).'/../views/view.login.php');
        $this->view = new Login_View();
    }

    public function layout_request() {

    }

    public function partials_request() {
        $this->view->sign_in_view($this->registration);
    }
}
?>

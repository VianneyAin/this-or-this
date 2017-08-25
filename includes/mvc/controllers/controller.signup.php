<?php
class Signup_Controller extends Application {

    public function __construct(){
        parent::__construct();//get parent's variables
        require_once(dirname(__FILE__).'/../views/view.signup.php');
        $this->view = new Signup_View();
    }

    public function layout_request() {

    }

    public function partials_request() {
        $this->view->sign_up_view($this->registration);
    }
}
?>

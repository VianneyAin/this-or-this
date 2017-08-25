<?php
class Home_Controller extends Application{
    public function __construct(){
        parent::__construct();//get parent's variables
        require_once(dirname(__FILE__).'/../views/view.home.php');
        $this->view = new Home_View();
        $this->permission_object->user_do('read_home_page');
    }


    public function layout_request() {

    }

    public function partials_request() {
        $this->view->fn_home_view($this->registration);
    }
}
?>

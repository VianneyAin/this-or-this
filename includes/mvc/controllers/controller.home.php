<?php
class Home_Controller extends Application{
    private $data;

    public function __construct(){
        parent::__construct();//get parent's variables
        require_once(dirname(__FILE__).'/../models/model.home.php');
        $this->model = new Home_Model();
        require_once(dirname(__FILE__).'/../views/view.home.php');
        $this->view = new Home_View();
        $this->permission_object->user_do('read_home_page');
    }


    public function layout_request() {
        $this->data = $this->model->get_last_jokes('10');
    }

    public function partials_request() {
        $this->view->fn_home_view($this->registration, $this->data);
    }
}
?>

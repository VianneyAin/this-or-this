<?php
class Home_Controller extends Application{
    private $data;

    public function __construct(){
        parent::__construct();//get parent's variables
        require_once(dirname(__FILE__).'/../models/model.home.php');
        $this->model = new Home_Model($this->user_object);
        require_once(dirname(__FILE__).'/../views/view.home.php');
        $this->view = new Home_View($this->user_object);
        $this->permission_object->user_do('read_home_page');
    }


    public function layout_request() {
        $this->data['jokes'] = $this->model->get_last_jokes('10');
        $this->data['categories'] = $this->model->get_all_categories();
    }

    public function partials_request() {
        $this->view->fn_home_view($this->registration, $this->data);
    }
}
?>

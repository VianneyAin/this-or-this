<?php
class Admin_Controller extends Application{
    private $data;
    private $routes;

    public function __construct($routes){
        parent::__construct();//get parent's variables
        $this->routes = $routes;
        require_once(dirname(__FILE__).'/../models/model.admin.php');
        $this->model = new Admin_Model();
        require_once(dirname(__FILE__).'/../views/view.admin.php');
        $this->view = new Admin_View();
        $this->permission_object->user_do('read_admin_dashboard');
    }

    public function layout_request() {
        if (isset($this->routes[1]) && !empty($this->routes[1])){
            switch($this->routes[1]){
                case 'blagues':
                    $this->data = $this->model->get_drafted_jokes();
                    break;
                case 'users':
                    break;
                default:
                    echo 'here';
            }
        }
        else {
            $this->data = $this->model->get_drafted_jokes();
        }

    }

    public function partials_request() {
        if (isset($this->routes[1]) && !empty($this->routes[1])){
            switch($this->routes[1]){
                case 'blagues':
                    $this->view->admin_navbar_view();
                    $this->view->manage_jokes_view($this->data);
                    break;
                case 'users':
                    break;
                default:
                    echo 'here';
            }
        }
        else {
            $this->view->admin_dashboard_view($this->data);
        }
    }
}
?>

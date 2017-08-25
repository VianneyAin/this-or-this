<?php
class Jokes_Controller extends Application{

    private $action;

    private $valid_actions = array(
        'create',
        'edit',
        'list',
    );

    public function __construct(){
        parent::__construct();//get parent's variables
        require_once(dirname(__FILE__).'/../models/model.jokes.php');
        $this->model = new Jokes_Model();
        require_once(dirname(__FILE__).'/../views/view.jokes.php');
        $this->view = new Jokes_View();
        $this->jokes_listen();
    }

    public function jokes_listen(){
        if (isset($_GET['action']) && !empty($_GET['action'])) {
            if ($this->is_valid_action(htmlspecialchars($_GET['action']))){
                $this->action = htmlspecialchars($_GET['action']);
            }
        }
    }

    public function is_valid_action($attr){
        if (in_array($attr, $this->valid_actions)) {
            return true;
        } else {
            return false;
        }
    }

    public function layout_request() {

    }

    public function partials_request() {
    }
}
?>

<?php
class Jokes_Controller extends Application{

    private $action;
    private $joke_listen_id;
    private $data;
    private $routes;
    private $valid_actions = array(
        'create',
        'edit',
        'list',
        'admin',
    );

    //localhost/jokes/blague?action=create
    //localhost/jokes/blague?id=5


    public function __construct($routes){
        parent::__construct();//get parent's variables
        $this->routes = $routes;
        require_once(dirname(__FILE__).'/../models/model.jokes.php');
        $this->model = new Jokes_Model();
        require_once(dirname(__FILE__).'/../views/view.jokes.php');
        $this->view = new Jokes_View();
        $this->jokes_listen_get();
        $this->jokes_listen_post();
    }

    public function jokes_listen_get(){
        if (isset($_GET['action']) && !empty($_GET['action'])) {
            if ($this->is_valid_action(htmlspecialchars($_GET['action']))){
                $this->action = htmlspecialchars($_GET['action']);
            }
        }
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            $this->joke_listen_id = htmlspecialchars($_GET['id']);
        }
    }

    public function jokes_listen_post(){
        if (isset($_POST)){
            $this->data['post'] = array();
            if (isset($_POST['form_action']) && !empty($_POST['form_action'])){
                $this->data['post']['form_action'] = htmlspecialchars($_POST['form_action']);
                if (isset($_POST['joke_content']) && !empty($_POST['joke_content']) ){
                    $this->data['post']['joke_content'] = htmlspecialchars($_POST['joke_content']);
                    $this->data['post']['valide'] = true;
                }
                else {
                    $this->data['post']['callback'] = array(
                        'field' => 'joke_content',
                        'success' => false,
                        'message' => 'Il manque le contenu de votre blague.',
                    );
                }
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
        if (isset($this->routes[1]) && !empty($this->routes[1])){
            //if routes[1] is not integer
            if ((string)(int)$this->routes[1] != $this->routes[1]){
                switch($this->routes[1]){
                    // /blague/create
                    case 'create':
                        $this->permission_object->user_do('create_joke');
                        if (!empty($this->data['post']) && $this->data['post'] && isset($this->data['post']['valide']) && $this->data['post']['valide'] === true){
                            $this->data['post']['callback'] = $this->model->save_joke($this->data['post'], $this->user_object->return_ID());
                        }
                        break;
                    default:
                }
            }
            //joke single : /blague/id
            else {
                $this->permission_object->user_do('read_joke_single');
                $this->data = $this->model->get_joke_by_id(intval($this->routes[1]));
            }
        }
        else {

        }
    }

    public function partials_request() {
        if (isset($this->routes[1]) && !empty($this->routes[1])){
            //if routes[1] is not integer
            if ((string)(int)$this->routes[1] != $this->routes[1]){
                switch($this->routes[1]){
                    // /blague/create
                    case 'create':
                        if (isset($this->data['post']) && !empty($this->data['post'])){
                            if ( $this->data['post']['callback']['success'] ){
                                $this->view->joke_success_view($this->data['post']);
                            }
                            else {
                                $this->view->joke_create_view($this->data['post']);
                            }
                        }
                        else {
                            $this->view->joke_create_view();
                        }

                        break;
                    default:
                }
            }
            //joke single : /blague/id
            else {
                $this->view->single_joke_view($this->data);
            }
        }
        else {

        }
    }
}
?>

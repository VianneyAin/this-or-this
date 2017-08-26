<?php
class Jokes_Controller extends Application{

    private $action;
    private $joke_listen_id;
    private $data;

    private $valid_actions = array(
        'create',
        'edit',
        'list',
        'admin',
    );

    public function __construct(){
        parent::__construct();//get parent's variables
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
        if (isset($this->joke_listen_id) && !empty($this->joke_listen_id)){
            $this->permission_object->user_do('read_joke_single');
            $this->data = $this->model->get_joke_by_id($this->joke_listen_id);
        }
        else if (isset($this->action) && !empty($this->action)) {
            switch ($this->action){
                case 'create':
                    $this->permission_object->user_do('create_joke');
                    break;
                case 'admin':
                    break;
                default:
                    break;
            }
        }
        else if (!empty($this->data['post']) && $this->data['post'] && $this->data['post']['valide'] === true){
            $this->data['post']['callback'] = $this->model->save_joke($this->data['post'], $this->user_object->return_ID());
        }
    }

    public function partials_request() {
        if (isset($_GET['id']) && !empty($_GET['id'])){
            $this->view->single_joke_view($this->data);
        }
        else if (isset($this->action) && !empty($this->action) ) {
            switch ($this->action){
                case 'create':
                    $this->view->joke_create_view();
                    break;
                case 'admin':
                    $this->view->admin_view($this->data);
                    break;
                default:
                    break;
            }

        }
        else if (isset($this->data['post']) && !empty($this->data['post'])){
            $this->view->joke_create_view($this->data['post']);
        }
    }
}
?>

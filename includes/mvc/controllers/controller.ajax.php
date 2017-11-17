<?php
class Ajax_Controller extends Application{
    private $routes;
    private $callback;
    private $action;
    private $ajax_controller;

    private $valid_actions = array(
        'update_tot_played' => array(
            'controller' => array(
                    'file_name' => 'tot', //the ajax controller called by this action
                    'controller_name' => 'Tot_Ajax',
            ),
            'action' => 'update_played', //the method called in the ajax controller
        ),
        'get_random_tot' => array(
            'controller' => array(
                    'file_name' => 'tot', //the ajax controller called by this action
                    'controller_name' => 'Tot_Ajax',
            ),
            'action' => 'get_random_tot', //the method called in the ajax controller
        ),
        'add_challenge_score' => array(
            'controller' => array(
                    'file_name' => 'tot', //the ajax controller called by this action
                    'controller_name' => 'Tot_Ajax',
            ),
            'action' => 'add_challenge_score', //the method called in the ajax controller
        ),
    );

    public function __construct($routes){
        parent::__construct();//get parent's variables
        // we need the model to query the database later in the controller
        $this->callback = $this->ajax_listen_action();
        $this->check_callback();
        $this->callback = $this->handle_action();
        $this->check_callback();
    }

    public function ajax_listen_action(){
        if (isset($_REQUEST['from']) && !empty($_REQUEST['from'])){
            if ($this->check_from_action($_REQUEST['from'])){
                if (isset($_REQUEST['action']) && !empty($_REQUEST['action']) && array_key_exists($_REQUEST['action'], $this->valid_actions) ){
                    $this->action = htmlspecialchars($_REQUEST['action']);
                }
                else {
                    $message = array(
                            'message' => 'Missing or invalid action.',
                            'success' => false,
                    );
                    return $message;
                }
            }
            else {
                $message = array(
                        'message' => 'Who are you, haxxor ?',
                        'success' => false,
                );
                return $message;
            }
        }
        else {
            $message = array(
                    'message' => 'Project informations are missing.',
                    'success' => false,
            );
            return $message;
        }
    }

    public function handle_action(){
        foreach ($this->valid_actions as $action_name => $action_data){
            if ($action_name == $this->action){
              require_once('includes/mvc/controllers/ajax/controller.ajax.' . $action_data['controller']['file_name'] . '.php');
              $controller_name = $action_data['controller']['controller_name'].'_Controller';
              $this->ajax_controller = new $controller_name();
              $function_name = $action_data['action'];
              return $this->ajax_controller->$function_name();
            }
        }
    }

    public function check_from_action($from){
        switch ($from){
            //if request is from admin, we check it is really an admin
            case 'admin':
                if (!$this->user_object->is_admin)
                    return false;
                break;
            case 'user':
                break;
            case 'guest':
                break;
            default:
                break;
        }
        return true;
    }

    public function check_callback(){
        if (!empty($this->callback)){
            die(json_encode($this->callback));
        }
    }


}
?>

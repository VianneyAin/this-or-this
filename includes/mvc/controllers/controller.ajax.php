<?php
class Ajax_Controller extends Application{
    private $routes;
    private $callback;
    private $action;
    private $ajax_controller;

    private $valid_actions = array(
        'update_jokes_status' => array(
            'controller' => array(
                    'file_name' => 'jokes', //the ajax controller called by this action
                    'controller_name' => 'Jokes_Ajax',
            ),
            'action' => 'update_status', //the method called in the ajax controller
            'permission' => 'update_jokes_status', //the name of the permission to execute the action, has to be set in permission.php
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
        if (isset($_REQUEST['from']) && !empty($_REQUEST['from']) && $_REQUEST['from'] == 'admin'){
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
                    'message' => 'Project informations are missing.',
                    'success' => false,
            );
            return $message;
        }
    }

    public function handle_action(){
        foreach ($this->valid_actions as $action_name => $action_data){
            if ($action_name == $this->action){
                if ($this->permission_object->user_do($action_data['permission'])){
                    require_once('includes/mvc/controllers/ajax/controller.ajax.' . $action_data['controller']['file_name'] . '.php');
                    $controller_name = $action_data['controller']['controller_name'].'_Controller';
                    $this->ajax_controller = new $controller_name();
                    return $this->ajax_controller->$action_data['action']();
                }
                else {
                    $message = array(
                            'message' => 'You have not the right to do that.',
                            'success' => false,
                    );
                    return $message;
                }
            }
        }
    }

    public function check_callback(){
        if (!empty($this->callback)){
            die(json_encode($this->callback));
        }
    }


}
?>
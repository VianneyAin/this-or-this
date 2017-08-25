<?php
class Profile_Controller extends Application {

    public function __construct(){
        parent::__construct();//get parent's variables
        require_once(dirname(__FILE__).'/../models/model.profile.php');
        $this->model = new Profile_Model();
        require_once(dirname(__FILE__).'/../views/view.profile.php');
        $this->view = new Profile_View();
    }

    public function layout_request() {
        $this->user = $this->model->get_current_user($this->registration->GetSessionInfos('username'));
    }

    public function partials_request() {
        $this->view->profile_current_user_view($this->registration, $this->user);
    }
}
?>

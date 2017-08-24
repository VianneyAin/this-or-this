<?php
class Page_Controller {

    public function __construct(){
        // we need the model to query the database later in the controller
        require_once(dirname(__FILE__).'/../models/model.pages.php');
        require_once(dirname(__FILE__).'/../views/view.pages.php');
        $this->model = new Page_Model();
        $this->view = new Page_View();
    }

    public function layout_request() {

    }

    public function partials_request() {
        
    }
}
?>

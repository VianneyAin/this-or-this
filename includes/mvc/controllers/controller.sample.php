<?php
class MAJ_Name_Controller extends Application{
    public $meta;
    
    public function __construct(){
        parent::__construct();//get parent's variables
        // we need the model to query the database later in the controller
        require_once(dirname(__FILE__).'/../models/model.min_name.php');
        require_once(dirname(__FILE__).'/../views/view.min_name.php');
        $this->model = new MAJ_Name_Model();
        $this->view = new MAJ_Name_View();
    }

    public function layout_request() {
    }

    public function get_meta(){
      return $this->meta;
    }

    public function partials_request() {
    }
}
?>

<?php
class Header_Controller extends Application{
    private $actions;
    private $categories;

    public function __construct($actions){
        parent::__construct();//get parent's variables
        // we need the model to query the database later in the controller
        require_once(dirname(__FILE__).'/../models/model.header.php');
        require_once(dirname(__FILE__).'/../views/view.header.php');
        $this->model = new Header_Model();
        $this->view = new Header_View();
        $this->actions = $actions;
    }

    public function update_actions($actions){
        $this->actions = $actions;
    }

    public function layout_request() {
        $this->categories = $this->model->get_all_categories();
    }

    public function partials_request() {
        $this->view->fn_header_view($this->registration, $this->actions, $this->categories);
    }
}
?>

<?php
class Header_Controller extends Application{
    private $actions;
    private $categories;
    public $meta;

    public function __construct($actions, $meta){
        parent::__construct();//get parent's variables
        // we need the model to query the database later in the controller
        require_once(dirname(__FILE__).'/../models/model.header.php');
        require_once(dirname(__FILE__).'/../views/view.header.php');
        $this->model = new Header_Model();
        $this->view = new Header_View();
        $this->actions = $actions;
        $this->meta = $meta;
    }

    public function update_actions($actions){
        $this->actions = $actions;
    }

    public function layout_request() {
    }

    public function partials_request() {
        $this->view->fn_header_view($this->meta);
    }
}
?>

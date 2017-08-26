<?php
class Footer_Controller {
    private $actions;

    public function __construct($actions){
        // we need the model to query the database later in the controller
        require_once(dirname(__FILE__).'/../models/model.footer.php');
        require_once(dirname(__FILE__).'/../views/view.footer.php');
        $this->model = new Footer_Model();
        $this->view = new Footer_View();
        $this->actions = $actions;
    }

    public function update_actions($actions){
        $this->actions = $actions;
    }

    public function layout_request() {

    }

    public function partials_request() {
        $this->view->fn_footer_view($this->actions);
    }
}
?>

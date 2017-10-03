<?php
class Tot_Controller extends Application{
    private $routes;
    private $category;
    private $data;

    public function __construct($routes){
        parent::__construct();//get parent's variables
        $this->routes = $routes;
        // we need the model to query the database later in the controller
        require_once(dirname(__FILE__).'/../models/model.tot.php');
        require_once(dirname(__FILE__).'/../views/view.tot.php');
        $this->model = new Tot_Model();
        $this->view = new Tot_View();
        $this->check_tot_category($this->routes);
    }

    public function check_tot_category($routes){
      if (isset($routes) && isset($routes[0]) && !empty($routes[0]) && $routes[0] == 'tot'){
        if (isset($routes[1]) && !empty($routes[1])){
          $this->category = $routes[1];
        }
      }
      else {
        die('Wrong route. Sorry.');
      }
    }

    public function layout_request() {
      if (isset($this->category) && !empty($this->category)){
        $this->data = $this->model->get_category_single($this->category);
      }
      else {
        //$this->data['categories'] = $this->model->get_all_categories();
      }
    }

    public function partials_request() {
      if (isset($this->category) && !empty($this->category)){
        $this->data = $this->view->display_tot_category_view($this->data);
      }
      else {
        //$this->data['categories'] = $this->model->get_all_categories();
      }
    }
}
?>

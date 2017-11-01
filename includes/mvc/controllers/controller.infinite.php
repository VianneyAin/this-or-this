<?php
class Infinite_Controller extends Application{
    private $routes;
    private $category;
    private $data;
    public $meta = array(
      'en' => array(
        'title' => "This or This - Infinite Mode",
        'description' => 'Will you be able to explode your score in infinite mode?',
        'image' => 'img/seo/infinite_thumbnail.png',
        'code' => 'en',
      ),
      'fr' => array(
        'title' => 'This or This - Mode Infini',
        'description' => "Parviendrez-vous à exploser votre score en mode infini ?",
        'image' => 'img/seo/infinite_thumbnail_fr.png',
        'code' => 'fr',
      ),
      'de' => array(
        'title' => 'This or This - Unendlicher Modus',
        'description' => 'Können Sie Ihre Punktzahl im unendlichen Modus explodieren lassen?',
        'image' => 'img/seo/infinite_thumbnail_de.png',
        'code' => 'de',
      ),
      'es' => array(
        'title' => 'This or This - Modo Infinito',
        'description' => '¿Podrás explotar tu puntaje en modo infinito?',
        'image' => 'img/seo/infinite_thumbnail_es.png',
        'code' => 'es',
      ),
      'pt' => array(
        'title' => 'This or This - Modo Infinito',
        'description' => 'Você poderá explodir sua pontuação em modo infinito?',
        'image' => 'img/seo/infinite_thumbnail_pt.png',
        'code' => 'pt',
      ),
    );

    public function __construct($routes){
        parent::__construct();//get parent's variables
        $this->routes = $routes;
        // we need the model to query the database later in the controller
        require_once(dirname(__FILE__).'/../models/model.infinite.php');
        require_once(dirname(__FILE__).'/../views/view.infinite.php');
        $this->model = new Infinite_Model();
        $this->view = new Infinite_View();
        $this->check_tot_category($this->routes);
    }

    public function check_tot_category($routes){
      if (Application::this()->current_lang == Application::this()->default_language){
        if (isset($routes) && isset($routes[0]) && !empty($routes[0]) && $routes[0] == 'infinite'){
          if (isset($routes[1]) && !empty($routes[1])){
            $this->category = $routes[1];
          }
        }
        else {
          die('Wrong route. Sorry.');
        }
      }
      else {
        if (isset($routes) && isset($routes[1]) && !empty($routes[1]) && $routes[1] == 'infinite'){
          if (isset($routes[2]) && !empty($routes[2])){
            $this->category = $routes[2];
          }
        }
        else {
          die('Wrong route. Sorry.');
        }
      }

    }

    public function layout_request() {
      //$this->data = $this->model->get_single_tot();
    }

    public function set_title($title){
      if (isset($title) && !empty($title)){
        foreach ($this->meta as $key => $langue){
          $this->meta[$key]['title'] = 'This or this - '.__t($title);
        }
      }
    }

    public function set_thumbnail($path){
      if (isset($path) && !empty($path)){
        foreach ($this->meta as $key => $langue){
          $this->meta[$key]['image'] = 'img/thumbnail/'.$path;
        }
      }
    }

    public function get_meta(){
      return $this->meta;
    }

    public function partials_request() {
      $this->view->display_infinite_view();
    }
}
?>

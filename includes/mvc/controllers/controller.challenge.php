<?php
class Challenge_Controller extends Application{
    private $routes;
    private $category;
    private $data;
    public $meta = array(
      'en' => array(
        'title' => "This or This - Challenge Mode",
        'description' => 'Ready to take the challenge? Try to enter in the legend.',
        'image' => 'img/seo/infinite_thumbnail.png',
        'code' => 'en',
      ),
      'fr' => array(
        'title' => 'This or This - Mode Défi',
        'description' => "Prêt à relever le défi ? Essaye d'écrire ton nom dans la légende.",
        'image' => 'img/seo/infinite_thumbnail_fr.png',
        'code' => 'fr',
      ),
      'de' => array(
        'title' => 'This or This - Herausforderungsmodus',
        'description' => 'Bereit, die Herausforderung anzunehmen? Versuchen Sie, die Legende einzugeben.',
        'image' => 'img/seo/infinite_thumbnail_de.png',
        'code' => 'de',
      ),
      'es' => array(
        'title' => 'This or This - Modo Desafío',
        'description' => '¿Listo para tomar el desafío? Trata de ingresar a la leyenda.',
        'image' => 'img/seo/infinite_thumbnail_es.png',
        'code' => 'es',
      ),
      'pt' => array(
        'title' => 'This or This - Modo Desafio',
        'description' => 'Pronto para enfrentar o desafio? Tente inserir a legenda.',
        'image' => 'img/seo/infinite_thumbnail_pt.png',
        'code' => 'pt',
      ),
    );

    public function __construct($routes){
        parent::__construct();//get parent's variables
        $this->routes = $routes;
        // we need the model to query the database later in the controller
        require_once(dirname(__FILE__).'/../models/model.challenge.php');
        require_once(dirname(__FILE__).'/../views/view.challenge.php');
        $this->model = new Challenge_Model();
        $this->view = new Challenge_View();
        $this->check_tot_category($this->routes);
    }

    public function check_tot_category($routes){
      if (Application::this()->current_lang == Application::this()->default_language){
        if (isset($routes) && isset($routes[0]) && !empty($routes[0]) && $routes[0] == 'challenge'){
          if (isset($routes[1]) && !empty($routes[1])){
            $this->category = $routes[1];
          }
        }
        else {
          die('Wrong route. Sorry.');
        }
      }
      else {
        if (isset($routes) && isset($routes[1]) && !empty($routes[1]) && $routes[1] == 'challenge'){
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
      $this->data['categories'] = $this->model->get_some_categories('4');
      $this->data['hof'] = $this->model->get_hof();
    }

    public function partials_request() {
      $this->view->display_challenge_view($this->data);
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

}
?>

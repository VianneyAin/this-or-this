<?php
class Tot_Controller extends Application{
    private $routes;
    private $category;
    private $data;
    public $meta = array(
      'en' => array(
        'title' => "This or This - It's time to make a choice",
        'description' => 'Have fun guessing what the picture is and share it with your friends.',
        'image' => 'img/thisorthis_thumbnail.jpg',
        'code' => 'en',
      ),
      'fr' => array(
        'title' => 'This or This - Il est temps de faire un choix',
        'description' => "Viens t'amuser à deviner à quoi correspond l'image et partage le avec tes amis.",
        'image' => 'img/thisorthis_thumbnail.jpg',
        'code' => 'fr',
      ),
      'de' => array(
        'title' => 'This or This - Es ist Zeit, eine Entscheidung zu treffen',
        'description' => 'Viel Spaß beim Erraten, was das Bild ist und teilen Sie es mit Ihren Freunden.',
        'image' => 'img/thisorthis_thumbnail.jpg',
        'code' => 'de',
      ),
      'es' => array(
        'title' => 'This or This - Es hora de hacer una elección',
        'description' => 'Diviértete adivinando cuál es la imagen y compártela con tus amigos.',
        'image' => 'img/thisorthis_thumbnail.jpg',
        'code' => 'es',
      ),
      'pt' => array(
        'title' => 'This or This - É hora de fazer uma escolha',
        'description' => 'Divirta-se adivinhar o que é a imagem e compartilhá-la com seus amigos.',
        'image' => 'img/thisorthis_thumbnail.jpg',
        'code' => 'pt',
      ),
    );

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
      if (Application::this()->current_lang == Application::this()->default_language){
        if (isset($routes) && isset($routes[0]) && !empty($routes[0]) && $routes[0] == 'tot'){
          if (isset($routes[1]) && !empty($routes[1])){
            $this->category = $routes[1];
          }
        }
        else {
          die('Wrong route. Sorry.');
        }
      }
      else {
        if (isset($routes) && isset($routes[1]) && !empty($routes[1]) && $routes[1] == 'tot'){
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
      if (isset($this->category) && !empty($this->category)){
        $this->data['current'] = $this->data = $this->model->get_category_single($this->category);
        $this->data['categories'] = $this->model->get_some_categories('4', $this->data['current']['id']);
        $this->set_title($this->data['current']['title']);
        $this->set_thumbnail($this->data['current']['thumbnail_name']);
      }
      else {
        $this->data['categories'] = $this->model->get_all_categories();
      }
    }

    public function partials_request() {
      if (isset($this->category) && !empty($this->category)){
        $this->view->display_tot_category_view($this->data['current'], $this->data['categories']);
      }
      else {
        $this->view->display_tot_categories_view($this->data);
      }
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
          if (isset($langue['code']) && !empty($langue['code']) && $langue['code'] != Application::this()->default_language )
          {
            $this->meta[$key]['image'] = 'img/thumbnail/'.preg_replace('/_thumbnail/', '_thumbnail_'.$langue['code'], $path);
          }
          else {
            $this->meta[$key]['image'] = 'img/thumbnail/'.$path;
          }

        }
      }
    }

    public function get_meta(){
      return $this->meta;
    }
}
?>

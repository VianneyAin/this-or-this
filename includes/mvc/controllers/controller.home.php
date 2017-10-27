<?php
class Home_Controller extends Application{
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

  public function __construct(){
    parent::__construct();//get parent's variables
    require_once(dirname(__FILE__).'/../models/model.home.php');
    $this->model = new Home_Model($this->user_object);
    require_once(dirname(__FILE__).'/../views/view.home.php');
    $this->view = new Home_View($this->user_object);
  }

  public function get_meta(){
    return $this->meta;
  }

  public function layout_request() {
    $this->data['categories'] = $this->model->get_last_categories();
  }

  public function partials_request() {
    $this->view->fn_home_view($this->data);
  }
}
?>

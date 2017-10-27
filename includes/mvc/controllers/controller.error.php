<?php
class Error_Controller {
    public $meta = array(
      'en' => array(
        'title' => "This or This - 404",
        'description' => 'You seem to be lost !',
        'image' => 'img/thisorthis_thumbnail.jpg',
        'code' => 'en',
      ),
      'fr' => array(
        'title' => 'This or This - 404',
        'description' => "Il semblerait que vous soyez perdu !",
        'image' => 'img/thisorthis_thumbnail.jpg',
        'code' => 'fr',
      ),
      'de' => array(
        'title' => 'This or This - 404',
        'description' => 'Du scheinst verloren zu sein !',
        'image' => 'img/thisorthis_thumbnail.jpg',
        'code' => 'de',
      ),
      'es' => array(
        'title' => 'This or This - 404',
        'description' => 'Pareces perdido !',
        'image' => 'img/thisorthis_thumbnail.jpg',
        'code' => 'es',
      ),
      'pt' => array(
        'title' => 'This or This - 404',
        'description' => 'Você parece estar perdido !',
        'image' => 'img/thisorthis_thumbnail.jpg',
        'code' => 'pt',
      ),
    );

    public function __construct(){
        require_once(dirname(__FILE__).'/../views/view.error.php');
        $this->view = new Error_View();
    }

    public function get_meta(){
      return $this->meta;
    }

    public function layout_request() {

    }

    public function partials_request() {
        $this->view->fn_error_view();
    }
}
?>

<?php
class About_Controller extends Application{
    public $meta = array(
      'en' => array(
        'title' => "This or This - About",
        'description' => 'What is This or This ? Why ? Where ? When ? How ? All you need to now is right here.',
        'image' => 'img/thisorthis_thumbnail.jpg',
        'code' => 'en',
      ),
      'fr' => array(
        'title' => 'This or This - À propos',
        'description' => "Qu'est ce que This or This ? Pourquoi ? Ou ? Quand ? Comment ? Tout ce que vous devez savoir est ici.",
        'image' => 'img/thisorthis_thumbnail.jpg',
        'code' => 'fr',
      ),
      'de' => array(
        'title' => 'This or This - Über',
        'description' => 'Was ist This or This ? Warum? Wo? Wann? Wie? Alles, was Sie wissen müssen, ist hier.',
        'image' => 'img/thisorthis_thumbnail.jpg',
        'code' => 'de',
      ),
      'es' => array(
        'title' => 'This or This - Acerca',
        'description' => '¿Qué es This or This ? Por qué ? ¿Dónde? ¿Cuándo? ¿Cómo? Todo lo que necesitas saber está aquí.',
        'image' => 'img/thisorthis_thumbnail.jpg',
        'code' => 'es',
      ),
      'pt' => array(
        'title' => 'This or This - Sobre',
        'description' => 'O que é a This or This ? Por quê? Onde? Quando? Como? Tudo o que você precisa saber está aqui.',
        'image' => 'img/thisorthis_thumbnail.jpg',
        'code' => 'pt',
      ),
    );

    public function __construct(){
        parent::__construct();//get parent's variables
        // we need the model to query the database later in the controller
        require_once(dirname(__FILE__).'/../views/view.about.php');
        $this->view = new About_View();
    }

    public function layout_request() {

    }

    public function get_meta(){
      return $this->meta;
    }

    public function partials_request() {
        $this->view->fn_about_view();
    }
}
?>

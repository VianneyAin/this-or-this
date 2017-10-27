<?php
class Contact_Controller extends Application{
    public $meta = array(
      'en' => array(
        'title' => "This or This - Contact",
        'description' => 'An idea to share or just a need to contact us, it is right here.',
        'image' => 'img/thisorthis_thumbnail.jpg',
        'code' => 'en',
      ),
      'fr' => array(
        'title' => 'This or This - Contact',
        'description' => "Une idée à partager ou tout simplement un besoin de nous contacter, c'est par ici.",
        'image' => 'img/thisorthis_thumbnail.jpg',
        'code' => 'fr',
      ),
      'de' => array(
        'title' => 'This or This - Kontakt',
        'description' => 'Eine Idee zu teilen oder nur ein Bedürfnis, uns zu kontaktieren, ist hier.',
        'image' => 'img/thisorthis_thumbnail.jpg',
        'code' => 'de',
      ),
      'es' => array(
        'title' => 'This or This - Contacto',
        'description' => 'Una idea para compartir o simplemente una necesidad de contactarnos, está aquí.',
        'image' => 'img/thisorthis_thumbnail.jpg',
        'code' => 'es',
      ),
      'pt' => array(
        'title' => 'This or This - Contato',
        'description' => 'Uma idéia para compartilhar ou apenas uma necessidade de entrar em contato conosco, está aqui.',
        'image' => 'img/thisorthis_thumbnail.jpg',
        'code' => 'pt',
      ),
    );

    public function __construct(){
        parent::__construct();//get parent's variables
        // we need the model to query the database later in the controller
        require_once(dirname(__FILE__).'/../models/model.contact.php');
        $this->model = new Contact_Model();
        require_once(dirname(__FILE__).'/../views/view.contact.php');
        $this->view = new Contact_View();
    }

    public function layout_request() {
        if (isset($_POST) && !empty($_POST) && isset($_POST['contact']) && !empty($_POST['contact']) && $_POST['contact'] == true){
            if (isset($_POST['email']) && !empty($_POST['email'])){
                if (isset($_POST['message']) && !empty($_POST['message'])){
                    $this->model->send_message($_POST['email'], $_POST['message']);
                }
            }
            else {

            }
        }
        else {

        }
    }

    public function get_meta(){
      return $this->meta;
    }

    public function partials_request() {
        $this->view->fn_contact_view();
    }
}
?>

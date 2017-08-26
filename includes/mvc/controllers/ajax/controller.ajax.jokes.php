<?php
class Jokes_Ajax_Controller {

    public function __construct(){
        require_once(dirname(__FILE__).'/../../models/ajax/model.ajax.jokes.php');
        $this->model = new Jokes_Ajax_Model();
    }

    public function update_status(){
        if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])){
            $joke_id = intval($_REQUEST['id']);
            if (isset($_REQUEST['status']) && !empty($_REQUEST['status'])){
                $joke_status = htmlspecialchars($_REQUEST['status']);
                return $this->model->update_status($joke_id, $joke_status);
            }
            else {
                $message = array(
                        'message' => 'Une erreur est survenue.',
                        'code' => '402',
                        'success' => false,
                );
                return $message;
            }
        }
        else {
            $message = array(
                    'message' => 'Une erreur est survenue.',
                    'code' => '401',
                    'success' => false,
            );
            return $message;
        }
    }

}
?>

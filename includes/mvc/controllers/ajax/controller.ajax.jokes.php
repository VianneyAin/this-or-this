<?php
class Jokes_Ajax_Controller {
    private $user_object;

    public function __construct($user_object){
        require_once(dirname(__FILE__).'/../../models/ajax/model.ajax.jokes.php');
        $this->model = new Jokes_Ajax_Model($user_object);
        $this->user_object = $user_object;
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

    public function valid_joke(){
        if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])){
            $joke_id = intval($_REQUEST['id']);
            if (isset($_REQUEST['status']) && !empty($_REQUEST['status'])
            && isset($_REQUEST['title']) && !empty($_REQUEST['title'])
            && isset($_REQUEST['content']) && !empty($_REQUEST['content']) ){
                $joke_status = htmlspecialchars($_REQUEST['status']);
                $joke_title = htmlspecialchars($_REQUEST['title']);
                $joke_content = htmlspecialchars($_REQUEST['content']);
                $joke_categories = '';
                if (isset($_REQUEST['categories']) && !empty($_REQUEST['categories']))
                    $joke_categories = $_REQUEST['categories'];
                return $this->model->valid_joke($joke_id, $joke_status, $joke_title, $joke_content, $joke_categories);
            }
            else {
                $message = array(
                        'message' => 'Il manque des informations.',
                        'code' => '413',
                        'success' => false,
                );
                return $message;
            }
        }
        else {
            $message = array(
                    'message' => 'Une erreur est survenue.',
                    'code' => '412',
                    'success' => false,
            );
            return $message;
        }
    }

    public function delete_joke(){
        if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])){
            $joke_id = intval($_REQUEST['id']);
            return $this->model->delete_joke($joke_id);

        }
        else {
            $message = array(
                    'message' => 'Une erreur est survenue.',
                    'code' => '411',
                    'success' => false,
            );
            return $message;
        }
    }

    public function rate_joke(){
        if (isset($_REQUEST['joke_id']) && !empty($_REQUEST['joke_id']) && isset($_REQUEST['rate_value']) && !empty($_REQUEST['rate_value'])){
            $joke_id = intval($_REQUEST['joke_id']);
            $rate_value = intval($_REQUEST['rate_value']);
            return $this->model->rate_joke($joke_id, $rate_value);

        }
        else {
            $message = array(
                    'message' => 'Une erreur est survenue.',
                    'code' => '425',
                    'success' => false,
            );
            return $message;
        }
    }

}
?>

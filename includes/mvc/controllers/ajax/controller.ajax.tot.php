<?php
class Tot_Ajax_Controller {

    public function __construct(){
        require_once(dirname(__FILE__).'/../../models/ajax/model.ajax.tot.php');
        $this->model = new Tot_Ajax_Model();
    }

    public function update_played(){
        if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])){
          $tot_id = htmlspecialchars($_REQUEST['id']);
          return $this->model->update_played($tot_id);
        }
        else {
            $message = array(
                    'message' => 'An error occured',
                    'code' => '401',
                    'success' => false,
            );
            return $message;
        }
    }

    public function get_random_tot(){
      return $this->model->get_random_tot();
    }
    
    public function add_challenge_score(){
        if (isset($_REQUEST['username']) && !empty($_REQUEST['username'])){
            if (isset($_REQUEST['score']) && !empty($_REQUEST['score'])){
              $username = htmlspecialchars($_REQUEST['username']);
              $score = intval(htmlspecialchars($_REQUEST['score']));
              return $this->model->add_challenge_score($username, $score);
            }
            else {
                $message = array(
                        'message' => 'Score cannot be empty',
                        'code' => '409',
                        'success' => false,
                );
                return $message;
            }
        }
        else {
            $message = array(
                    'message' => 'Username cannot be empty',
                    'code' => '408',
                    'success' => false,
            );
            return $message;
        }
    }


}
?>

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


}
?>

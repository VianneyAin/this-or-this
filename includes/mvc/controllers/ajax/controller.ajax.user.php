<?php
class User_Ajax_Controller {
    private $user_object;
    public function __construct($user_object){
        require_once(dirname(__FILE__).'/../../models/ajax/model.ajax.user.php');
        $this->model = new User_Ajax_Model();
        $this->user_object = $user_object;
    }

    public function update_own_infos(){
        //must be owner to updates user infos
        if ( (isset($_REQUEST['data']['user_id']) && !empty($_REQUEST['data']['user_id']) && intval($_REQUEST['data']['user_id']) == $this->user_object->userID) || $this->user_object->is_admin){

            if ( isset($_REQUEST['data']['user_name']) && !empty($_REQUEST['data']['user_name'])
                && isset($_REQUEST['data']['email']) && !empty($_REQUEST['data']['email'])
                && isset($_REQUEST['data']['password']) && !empty($_REQUEST['data']['password'])
            ){
                    $user_name = htmlspecialchars($_REQUEST['data']['user_name']);
                    $email = htmlspecialchars($_REQUEST['data']['email']);
                    $password = htmlspecialchars($_REQUEST['data']['password']);
                    $new_password = null;

                    if (isset($_REQUEST['data']['new_password']) && !empty($_REQUEST['data']['new_password'])
                        && isset($_REQUEST['data']['new_password_repeat']) && !empty($_REQUEST['data']['new_password_repeat'])
                    ){
                        if ($_REQUEST['data']['new_password_repeat'] = $_REQUEST['data']['new_password']){
                            $new_password = $_REQUEST['data']['new_password'];
                        }
                        else {
                            $message = array(
                                    'message' => "New passwords are not matching.",
                                    'code' => '417',
                                    'success' => false,
                            );
                            return $message;
                        }

                    }
                    return $this->model->update_user_infos($user_name, $email, $password, $new_password);
            }
            else {
                $message = array(
                        'message' => "Informations manquantes.",
                        'code' => '416',
                        'success' => false,
                );
                return $message;
            }
        }
        else {
            $message = array(
                    'message' => "Vous n'avez pas l'autorisation pour éditer ce profil.",
                    'code' => '415',
                    'success' => false,
            );
            return $message;
        }
    }


}
?>

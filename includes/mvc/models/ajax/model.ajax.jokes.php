<?php
  class Jokes_Ajax_Model {
    public function __construct() {

    }

    public function update_status($id, $status){
        if (isset($id) && !empty($id) && isset($status) && !empty($status)){
            try {
                $db = Db::getInstance();
                $req = $db->prepare('UPDATE jokes SET status = "'.$status.'" WHERE id = '.$id);

                $req->execute();
                if ($req->rowCount() == 1){
                    $message = array(
                            'message' => 'Le status a bien été modifié.',
                            'success' => true,
                    );
                    return $message;
                }
                else {
                    $message = array(
                            'message' => "Le status n'a pas été modifié.",
                            'code' => '405',
                            'success' => false,
                    );
                    return $message;
                }

            } catch (Exception $e) {
                $message = array(
                        'message' => 'Une erreur est survenue.',
                        'code' => '404',
                        'success' => false,
                );
                return $message;
            }
        }
        else {
            $message = array(
                    'message' => 'Une erreur est survenue.',
                    'code' => '403',
                    'success' => false,
            );
            return $message;
        }
    }

  }
?>

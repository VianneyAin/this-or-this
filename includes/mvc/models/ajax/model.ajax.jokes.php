<?php
  class Jokes_Ajax_Model {

    private $user_object;

    public function __construct($user_object) {
        $this->user_object = $user_object;
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

    public function rate_joke($joke_id, $rate_value){
        if (isset($joke_id) && !empty($joke_id) && isset($rate_value) && !empty($rate_value) ){
            if (isset($this->user_object) && !empty($this->user_object->userID)){
                $user_id = $this->user_object->userID;
                try {
                    $db = Db::getInstance();
                    $req = $db->prepare("UPDATE rates SET value = '$rate_value' WHERE joke='$joke_id' AND user = '$user_id'");
                    $req->execute();
                    if ($req->rowCount() == 1){
                        $message = array(
                                'message' => 'La blague a bien été notée.',
                                'success' => true,
                        );
                        return $message;
                    }
                    else {
                        try {
                            $req = $db->prepare("INSERT INTO rates (joke, user, value) value ('$joke_id','$user_id','$rate_value')");
                            $req->execute();
                            if ($req->rowCount() == 1){
                                $message = array(
                                        'message' => 'La blague a bien été notée.',
                                        'success' => true,
                                );
                                return $message;
                            }
                            else {
                                $message = array(
                                        'message' => "Echec de la notation",
                                        'code' => '430',
                                        'success' => false,
                                );
                                return $message;
                            }

                        } catch (Exception $e) {
                            $message = array(
                                    'message' => 'Une erreur est survenue.',
                                    'code' => '429',
                                    'success' => false,
                            );
                            return $message;
                        }
                    }

                } catch (Exception $e) {
                    $message = array(
                            'message' => 'Une erreur est survenue.',
                            'code' => '428',
                            'success' => false,
                    );
                    return $message;
                }
            }
            else {
                $message = array(
                        'message' => 'Vous devez être connecté pour noter une blague.',
                        'code' => '427',
                        'success' => false,
                );
                return $message;
            }
        }
        else {
            $message = array(
                    'message' => 'Il manque des informations.',
                    'code' => '426',
                    'success' => false,
            );
            return $message;
        }
    }

    public function valid_joke($id, $status, $title, $content){
        if (isset($id) && !empty($id) && isset($status) && !empty($status) && isset($title) && !empty($title) && isset($content) && !empty($content)){
            $content = $this->normalize($content);
            try {
                $db = Db::getInstance();
                $req = $db->prepare('UPDATE jokes SET status = "'.$status.'", title = "'.$title.'", content = "'.$content.'" WHERE id = '.$id);

                $req->execute();
                if ($req->rowCount() == 1){
                    $message = array(
                            'message' => 'La blague a bien été validée.',
                            'success' => true,
                    );
                    return $message;
                }
                else {
                    $message = array(
                            'message' => "Le status n'a pas été modifié.",
                            'code' => '410',
                            'success' => false,
                    );
                    return $message;
                }

            } catch (Exception $e) {
                $message = array(
                        'message' => 'Une erreur est survenue.',
                        'code' => '409',
                        'success' => false,
                );
                return $message;
            }
        }
        else {
            $message = array(
                    'message' => 'Il manque des informations.',
                    'code' => '408',
                    'success' => false,
            );
            return $message;
        }
    }

    public function delete_joke($id){
        if (isset($id) && !empty($id) ){
            try {
                $db = Db::getInstance();
                $req = $db->prepare('DELETE FROM jokes WHERE id = '.$id);

                $req->execute();
                if ($req->rowCount() == 1){
                    $message = array(
                            'message' => 'La blague a bien été supprimée.',
                            'success' => true,
                    );
                    return $message;
                }
                else {
                    $message = array(
                            'message' => "La blague n'a pas été supprimée.",
                            'code' => '416',
                            'success' => false,
                    );
                    return $message;
                }

            }
            catch (Exception $e) {
                $message = array(
                        'message' => 'Une erreur est survenue.',
                        'code' => '415',
                        'success' => false,
                );
                return $message;
            }
        }
        else {
            $message = array(
                    'message' => 'Il manque des informations.',
                    'code' => '414',
                    'success' => false,
            );
            return $message;
        }
    }

    function normalize($str) {
        $str = preg_replace('/\n(\s*\n)+/', '</p><p>', $str);
        $str = preg_replace('/\n/', '<br>', $str);
        $str = '<p>'.$str.'</p>';
        return html_entity_decode($str);
    }

  }
?>

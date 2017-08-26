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

    function normalize($str) {
        $str = preg_replace('/\n(\s*\n)+/', '</p><p>', $str);
        $str = preg_replace('/\n/', '<br>', $str);
        $str = '<p>'.$str.'</p>';
        return html_entity_decode($str);
    }

  }
?>

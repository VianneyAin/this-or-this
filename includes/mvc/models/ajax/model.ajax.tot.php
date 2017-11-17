<?php
  class Tot_Ajax_Model {


    public function __construct() {
    }

    public function update_played($id){
        if (isset($id) && !empty($id)){
            try {
                $db = Db::getInstance();
                //$req = $db->prepare("IF EXISTS (SELECT * FROM stats WHERE category = $id) UPDATE stats SET played = played + 1 WHERE category = $id ELSE INSERT INTO stats (category, played) VALUES ($id, '1')");
                $req = $db->prepare("SELECT * FROM stats WHERE category = $id LIMIT 1");
                $req->execute();
                if ($req->rowCount() == 1){
                    $req = $db->prepare("UPDATE stats SET played = played + 1 WHERE category = $id");
                    $req->execute();
                    if ($req->rowCount() == 1){
                        $message = array(
                                'message' => 'Item updated.',
                                'success' => true,
                        );
                        return $message;
                    }
                    else {
                        $message = array(
                                'message' => "Failed to update item.",
                                'code' => '407',
                                'success' => false,
                        );
                        return $message;
                    }
                }
                else {
                    $req = $db->prepare("INSERT INTO stats (category, played) VALUES ($id, '1')");
                    $req->execute();
                    if ($req->rowCount() == 1){
                        $message = array(
                                'message' => 'Item updated.',
                                'success' => true,
                        );
                        return $message;
                    }
                    else {
                        $message = array(
                                'message' => "Failed to update item.",
                                'code' => '405',
                                'success' => false,
                        );
                        return $message;
                    }
                }

            } catch (Exception $e) {
                $message = array(
                        'message' => 'An error occured.',
                        'code' => '404',
                        'success' => false,
                );
                return $message;
            }
        }
        else {
            $message = array(
                    'message' => 'An error occured.',
                    'code' => '403',
                    'success' => false,
            );
            return $message;
        }
    }

    public function get_random_tot(){
        try {
            if (isset($_REQUEST['lang']) && !empty($_REQUEST['lang'])){
              $lang = $_REQUEST['lang'];
            }
            $db = Db::getInstance();
            $sql = "SELECT * FROM categories where nsfl <> 1 AND visible <> 0 ORDER BY RAND() LIMIT 1";
            $req = $db->prepare($sql);
            // the query was prepared, now we replace :id with our actual $id value
            $req->execute();
            $cat = $req->fetch();
            if (isset($cat) && !empty($cat)){
              $sql = "SELECT * FROM elements WHERE category=".$cat['id']." ORDER BY RAND() LIMIT 1";
              $req = $db->prepare($sql);
              // the query was prepared, now we replace :id with our actual $id value
              $req->execute();
              $elmt = $req->fetch();
              $cat['choice_1'] = __tl($cat['choice_1'], $lang);
              $cat['choice_2'] = __tl($cat['choice_2'], $lang);
              $elmt['hidden_image'] = 'http://thisorthis.io'.$elmt['hidden_image'];
              $elmt['reveal_image'] = 'http://thisorthis.io'.$elmt['reveal_image'];
              $elmt['choice'] = __tl($elmt['choice'], $lang);
              $cat['element'] = $elmt;
            }
            return $cat;
        }
        catch (PDOexception $e) {
          $message = array(
                  'message' => 'An error occured.',
                  'code' => '406',
                  'success' => false,
          );
          return $message;
        }
    }
    
    public function add_challenge_score($username, $score){
        try {
            if (isset($_REQUEST['lang']) && !empty($_REQUEST['lang'])){
              $lang = $_REQUEST['lang'];
            }
            $db = Db::getInstance();
            $sql = "INSERT INTO `halloffame` (username, score, mode) VALUES ('$username', $score, 'challenge')";
            $req = $db->prepare($sql);
            // the query was prepared, now we replace :id with our actual $id value
            $req->execute();
            if ($req->rowCount() == 1){
                $message = array(
                        'message' => __tl('Score added', $lang),
                        'success' => true,
                );
                return $message;
            }
            else {
                $message = array(
                        'message' => "Failed to add score.",
                        'code' => '411',
                        'success' => false,
                );
                return $message;
            }
        }
        catch (PDOexception $e) {
          $message = array(
                  'message' => 'An error occured.',
                  'code' => '410',
                  'success' => false,
          );
          return $message;
        }
    }

  }
?>

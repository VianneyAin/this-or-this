<?php
  class Home_Model {
    private $user_object;

    public function __construct($user_object) {
        $this->user_object = $user_object;
    }

    public function get_last_categories(){
        try {
            $db = Db::getInstance();
            $sql = "SELECT * FROM categories where nsfl <> 1 AND visible <> 0 ORDER BY created DESC limit 8";
            $req = $db->prepare($sql);
            // the query was prepared, now we replace :id with our actual $id value
            $req->execute();
            $post = $req->fetchAll();
            if (isset($post) && !empty($post)){
                foreach ($post as $key => $cat){
                    $sql = 'SELECT count(*) FROM elements where category = "'.$cat['id'].'"';
                    $req = $db->prepare($sql);
                    // the query was prepared, now we replace :id with our actual $id value
                    $req->execute();
                    $cat_nb = $req->fetch();
                    $post[$key]['total'] = $cat_nb[0];
                }
              return $post;
            }
            else {
                return false;
            }
        }
        catch (PDOexception $e) {
            return false;
        }
    }
  }
?>

<?php
  class Footer_Model {
    public function __construct() {

    }

    public function get_latest_categories(){
        try {
            $db = Db::getInstance();
            $sql = "SELECT * FROM categories where nsfl <> 1 AND visible <> 0 ORDER BY created DESC LIMIT 8";
            $req = $db->prepare($sql);
            $req->execute();
            $post = $req->fetchAll();
            if (isset($post) && !empty($post)){
                foreach ($post as $key => $cat){
                    $sql = 'SELECT count(*) FROM elements where category = "'.$cat['id'].'"';
                    $req = $db->prepare($sql);
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

    public function get_popular_categories(){
        try {
            $db = Db::getInstance();
            $sql = "SELECT * FROM categories INNER JOIN stats on categories.id = stats.category where nsfl <> 1 AND visible <> 0 ORDER BY stats.played DESC LIMIT 8";
            $req = $db->prepare($sql);
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

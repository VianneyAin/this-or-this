<?php
  class Infinite_Model {
    public function __construct() {

    }

    public function get_single_tot(){
        try {
            $db = Db::getInstance();
            $sql = "SELECT * FROM elements ORDER BY RAND() LIMIT 1";
            $req = $db->prepare($sql);
            // the query was prepared, now we replace :id with our actual $id value
            $req->execute();
            $post = $req->fetchAll();
            if (isset($post[0]) or !empty($post[0]));
              $post = $post[0];
            if (isset($post['category']) && !empty($post['category'])){
              $sql = "SELECT * FROM categories WHERE id=".$post['category'];
              $req = $db->prepare($sql);
              // the query was prepared, now we replace :id with our actual $id value
              $req->execute();
              $cat = $req->fetchAll();
              $post['category'] = $cat[0];
            }
            return $post;
        }
        catch (PDOexception $e) {
            return false;
        }
    }

    public function get_some_categories($limit){
        try {
            $db = Db::getInstance();
            $sql = "SELECT * FROM categories where nsfl <> 1 AND visible <> 0 ORDER BY RAND() LIMIT $limit";
            $req = $db->prepare($sql);
            // the query was prepared, now we replace :id with our actual $id value
            $req->execute();
            $post = $req->fetchAll();
            if (isset($post) && !empty($post)){
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

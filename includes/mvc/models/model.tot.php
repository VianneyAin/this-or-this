<?php
  class Tot_Model {
    public function __construct() {

    }

    public function get_all_categories(){
        try {
            $db = Db::getInstance();
            $sql = "SELECT * FROM categories where nsfl <> 1 ORDER BY created DESC";
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

    public function get_category_single($slug){
        try {
            $db = Db::getInstance();
            $sql = "SELECT * FROM categories WHERE slug = '$slug' limit 1";
            $req = $db->prepare($sql);
            // the query was prepared, now we replace :id with our actual $id value
            $req->execute();
            $post = $req->fetch();
            if (isset($post) && !empty($post)){
              if (isset($post['id'])){
                $post['elements'] = $this->get_related_elements($post['id']);
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

    public function get_related_elements($id){
      try {
          $db = Db::getInstance();
          $sql = "SELECT * FROM elements WHERE category = '$id'";
          $req = $db->prepare($sql);
          // the query was prepared, now we replace :id with our actual $id value
          $req->execute();
          $post = $req->fetchAll();
          if (isset($post) && !empty($post)){
            return $post;
          }
          else {
            return null;
          }
      }
      catch (PDOexception $e) {
          return false;
      }
    }

  }
?>

<?php
  class Header_Model {
    public function __construct() {

    }

    public function get_all_categories(){
        try {
            $db = Db::getInstance();
            $req = $db->prepare('SELECT * FROM categories ORDER BY category_id ASC');
            $req->execute();
            $posts = $req->fetchAll();
            return $posts;
        }
        catch (PDOexception $e) {
            die($e->getMessage());
        }
    }
  }
?>

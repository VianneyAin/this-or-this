<?php
  class Post_Model {
    // we define 3 attributes
    // they are public so that we can access them using $post->author directly
    public $id;
    public $author;
    public $content;

    public function __construct() {
    }

    public function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM jokes');
      $list = array();
      // we create a list of Post objects from the database results
      foreach($req->fetchAll() as $post) {
          array_push($list, $post);
      }

      return $list;
    }

    public function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM jokes WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $post = $req->fetch();

      return new Post($post['id'], $post['author'], $post['content']);
    }
  }
?>

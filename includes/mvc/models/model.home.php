<?php
  class Home_Model {
    public function __construct() {

    }

    public function get_last_jokes($limit = null){
        try {
            $db = Db::getInstance();
            $req = $db->prepare('SELECT * FROM jokes WHERE status = "active" ORDER BY created DESC LIMIT '.$limit);
            $req->execute();
            $posts = $req->fetchAll();
            foreach ($posts as $key => $post){
                if (isset($post['author'])){
                    $posts[$key]['author'] = $this->get_user_by_id($post['author']);
                }
            }
            return $posts;
        }
        catch (PDOexception $e) {
            die($e->getMessage());
        }
    }

    public function get_user_by_id($user_id){
        if (isset($user_id) && !empty($user_id)){
            $db = Db::getInstance();
            $req = $db->prepare('SELECT * FROM users WHERE id = :user_id');
            // the query was prepared, now we replace :id with our actual $id value
            $req->execute(array('user_id' => $user_id));
            $user = $req->fetch();
            return array(
                'id' => $user['id'],
                'username' => $user['username'],
                'email' => $user['email'],
                'avatar' => $user['avatar'],
                //'background_image' => $user['background_image'],
                'firstname' => $user['firstname'],
                'lastname' => $user['lastname'],
                'description' => $user['description'],
                'display_name' => $this->get_user_display_name($user),
            );
        }
        else {
            return null;
        }
    }

    public function get_user_display_name($user){
        $name = '';
        if(!isset($user)){ return null; }
        if ( (isset($user['lastname']) && !empty($user['lastname'])) || (isset($user['firstname']) && !empty($user['firstname']))){
            $name = $user['firstname'];
            if (!empty($user['firstname']) && !empty($user['lastname'])){
                $name .= ' '.$user['lastname'];
            }
        }
        else {
            if (isset($user['username']) && !empty($user['username'])){
                $name = $user['username'];
            }

        }
        return $name;
    }
  }
?>

<?php
  class Admin_Model {
    public function __construct() {

    }

    public function get_drafted_jokes(){
        try {
            $db = Db::getInstance();
            $req = $db->prepare('SELECT * FROM jokes WHERE status = "draft"');
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

    public function get_all_categories(){
        try {
            $db = Db::getInstance();
            $req = $db->prepare('SELECT * FROM category');
            $req->execute();
            $posts = $req->fetchAll();
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
            if ($user) {
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
                return array(
                    'id' => '-1',
                    'username' => "JohnDoe",
                    'email' => "contact@johndoe.com",
                    'avatar' => 'http://lorempixel.com/400/200/abstract/',
                    //'background_image' => $user['background_image'],
                    'firstname' => 'John',
                    'lastname' => 'Doe',
                    'description' => '',
                    'display_name' => $this->get_user_display_name(array('firstname' => 'John', 'lastname' => 'Doe')),
                );
            }
        }
        else {
            return null;
        }
    }

    public function get_user_by_username($username){
        if (isset($username) && !empty($username)){
            $db = Db::getInstance();
            $req = $db->prepare('SELECT * FROM users WHERE id = :username');
            // the query was prepared, now we replace :id with our actual $id value
            $req->execute(array('username' => $username));
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

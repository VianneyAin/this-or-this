<?php
  class Profile_Model {
    public function __construct() {

    }

    public function get_current_user($username){
        $db = Db::getInstance();
        $req = $db->prepare('SELECT * FROM users WHERE username = :username');
        // the query was prepared, now we replace :id with our actual $id value
        $req->execute(array('username' => $username));
        $user = $req->fetch();
        $user = array(
            'username' => $user['username'],
            'email' => $user['email'],
            'avatar' => $user['avatar'],
            //'background_image' => $user['background_image'],
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'description' => $user['description'],
            'display_name' => $this->get_user_display_name($user),
        );
        return $user;
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

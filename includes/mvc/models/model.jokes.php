<?php
  class Jokes_Model {
    private $user_object;

    public function __construct($user_object) {
        $this->user_object = $user_object;
    }

    public function get_joke_by_id($joke_id){
        try {
            $db = Db::getInstance();
            // we make sure $id is an integer
            $id = intval($joke_id);

            if (isset($this->user_object->userID) && !empty($this->user_object->userID)){
                $user_id = $this->user_object->userID;
                $req = $db->prepare("SELECT * FROM rates WHERE user = '$user_id' && joke = '$id'");
                $req->execute(array('id' => $id));
                $rate = $req->fetch();
            }
            $req = $db->prepare("SELECT * FROM jokes WHERE id = $joke_id");
            // the query was prepared, now we replace :id with our actual $id value
            $req->execute();
            $post = $req->fetch();
            return array(
                    'id' => $post['id'],
                    'title' => $post['title'],
                    'content' => $post['content'],
                    'author' => $this->get_user_by_id($post['author']),
                    'status' => $post['status'],
                    'user_rating' => $rate
            );
        }
        catch (PDOexception $e) {
            return false;
        }
    }

    public function get_category_by_slug($slug){
        try {
            $db = Db::getInstance();
            $sql = "SELECT * FROM categories WHERE category_id = (SELECT category_id FROM categories WHERE slug = '$slug') limit 1";
            $req = $db->prepare($sql);
            // the query was prepared, now we replace :id with our actual $id value
            $req->execute();
            $post = $req->fetch();
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

    public function get_jokes_by_category_id($category_id){
        try {
            $db = Db::getInstance();
            $sql = "SELECT * FROM jokes LEFT JOIN users on jokes.author = users.id where status <> 'draft' LIMIT 9";
            $req = $db->prepare($sql);
            // the query was prepared, now we replace :id with our actual $id value
            $req->execute();
            $posts = $req->fetchAll();
            $jokes = array();
            foreach ($posts as $key => $post){
                if (isset($post['category']) && !empty($post['category'])){
                    $categories = explode(",", $post['category']);
                    foreach ($categories as $keyy => $category){
                        if (intval($category) == intval($category_id) ){
                            if (isset($post['joke_id'])){
                                $id = $post['joke_id'];
                                if (isset($this->user_object->userID) && !empty($this->user_object->userID)){
                                    $user_id = $this->user_object->userID;
                                    $req = $db->prepare("SELECT * FROM rates WHERE user = '$user_id' && joke = '$id'");
                                    $req->execute();
                                    $rate = $req->fetch();
                                    $post['user_rating'] = $rate;
                                }
                            }
                            array_push($jokes, $post);
                        }
                    }
                }
            }
            if (isset($jokes) && !empty($jokes) && sizeof($jokes) > 0){
                return $jokes;
            }
            else {
                return false;
            }
        }
        catch (PDOexception $e) {
            return false;
        }
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


    public function save_joke($data, $user_id){
        if (isset($data) && !empty($data)){
            if (isset($data['joke_content']) && !empty($data['joke_content'])
            && isset($user_id) && !empty($user_id) ){
                $data['joke_content'] = $this->normalize($data['joke_content']);
                try {
                    $db = Db::getInstance();
                    $req = $db->prepare('INSERT INTO jokes (content, author) VALUES (:joke_content, :user_id)');
                    $req->execute(array('joke_content' => $data['joke_content'], 'user_id' => $user_id));
                    return array(
                        'success' => true,
                        'id' => $db->lastInsertId(),
                        'message'=> 'Votre blague a bien été soumise ! Merci.'
                    );
                } catch (Exception $e) {
                    return array(
                        'success' => false,
                        'message'=> "Une erreur est survenue. Si le problème persiste, veuillez le signaler à l'administrateur du site.",
                    );
                }
            }
            else {
                return array(
                    'success' => false,
                    'message'=> "Une erreur est survenue. Si le problème persiste, veuillez le signaler à l'administrateur du site.",
                );
            }
        }
        else {
            return array(
                'success' => false,
                'message'=> "Une erreur est survenue. Si le problème persiste, veuillez le signaler à l'administrateur du site.",
            );
        }
    }

    function normalize($str) {
        $str = preg_replace('/\n(\s*\n)+/', '</p><p>', $str);
        $str = preg_replace('/\n/', '<br>', $str);
        $str = '<p>'.$str.'</p>';
        return html_entity_decode($str);
    }

  }
?>

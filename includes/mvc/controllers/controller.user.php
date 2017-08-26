<?php

class User {
	private $model;
	//WP Admin user id
	public $userID = null;
	//WP username
	public $user_name = null;
	//WP email
	public $user_email = null;
	//WP capabilities
	public $is_admin = false;

	function __construct($registration) {
        if(!isset($_SESSION)){ session_start();}
        if (!empty($_SESSION)){
            $this->userID = $_SESSION['id'];
            $this->user_name = $_SESSION['username'];
            $this->user_email = $_SESSION['email'];
            $this->is_admin = $this->is_admin($_SESSION['role']);
			$this->user_role = $_SESSION['role'];
        }
		else {
			$this->userID = null;
            $this->user_name = null;
            $this->user_email = null;
            $this->is_admin = false;
			$this->user_role = 'guest';
		}
	}

    public function is_admin($role){
        if ($role == 'admin'){
            return true;
        }
        return false;
    }

	public function return_ID() {
        return $this->userID;
	}

}



?>

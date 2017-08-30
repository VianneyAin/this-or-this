<?php

class Permission
{
	private $user_object;
	public $userRoles = array();
	public $userActivities;
	private $appRoles = array();
	private $moduleActivities = array();

	public function __construct(User $user_object) {
		//Dependancy injection
		$this->user_object = $user_object;

		//Load our roles
		$this->get_user_roles();

		//Load our roles
		$this->set_module_activities();
	}

	//Permission to do activity types in regards to the user ACL
	public function user_do($current_activity = null, $redirect = true) {
		$user_do_can = false;
		$error_redirect = '';
		if (!empty($current_activity)) {
			foreach ($this->moduleActivities as $modules) {
				foreach ($modules as $key_activity => $activity_roles) {
					if ($current_activity === $key_activity) {
						if (isset($activity_roles['redirect']))
							$error_redirect = $activity_roles['redirect'];
						//Loop roles for
						foreach ($this->userRoles as $role) {
							if (in_array($role, $activity_roles['roles'])) {
								$user_do_can = true;
							}
						}
					} else {
						//Keep looping
					}
				}
			}
			if ($user_do_can == true) {
				return true;
			} else {
				if ($redirect):
					$this->redirect($error_redirect);
				else:
					return false;
				endif;
			}
		} else {
			die('No activity requested!');
		}
	}

	//Returns the highest level of permissions as defined in $userRoles
	public function user_role_top() {
		//var_dump($this->userRoles);
		return $this->userRoles[0];
	}

	//Sets our roles
	private function set_roles() {
		$this->appRoles = array(
			'admin',
			'user',
            'guest',
		);
	}

	private function get_user_roles() {
		$this->set_roles();
		foreach ($this->appRoles as $role) {
			$is_role = false;
			switch ($role) {
				case 'admin':
					if ($this->user_object->is_admin === true) {
						$is_role = true;
					}
					break;
				case 'user':
					if (!empty($this->user_object->userID) && $this->user_object->is_admin === false) {
						$is_role = true;
					}
					break;
				case 'guest':
					if (empty($this->user_object->userID)) {
						$is_role = true;
					}
					break;
				default:
					die(__('Role does not exist'));
			}
			if ($is_role) {
				$this->userRoles[] = $role;
			}
		}
	}


	//TODO : 2nd arg - $message = null
	public function redirect($redirect = null) {
		if (!empty($redirect)) {
			switch ($redirect){
				case 'home':
					header("Location: http://localhost/jokes/", true);
					break;
				case 'login':
					header("Location: http://localhost/jokes/connexion", true);
					break;
				case 'error':
					header("Location: http://localhost/jokes/error", true);
					break;
				default :
					header("Location: http://localhost/jokes/error", true);
					break;
			}
		} else {
			header("Location: http://localhost/jokes/error", true);
		}
		exit;
	}


	public function set_module_activities() {
		//Only CRUD permissions please ! (Create, Read, Update, Delete)
		$this->moduleActivities = array(
			'home' => array(
				'read_home_page' => array(
					'roles' => array(
						'admin',
                        'user',
						'guest',
					),
					'redirect' => 'home',
				),
			),
			'login' => array(
				'read_login_page' => array(
					'roles' => array(
						'guest',
					),
					'redirect' => 'home',
				),
			),
			'inscription' => array(
				'read_signup_page' => array(
					'roles' => array(
						'guest',
					),
					'redirect' => 'home',
				),
			),
			'logout' => array(
				'read_logout_page' => array(
					'roles' => array(
						'admin',
						'user',
					),
					'redirect' => 'login',
				),
			),
			'joke' => array(
				'read_joke_single' => array(
					'roles' => array(
						'admin',
						'user',
						'guest',
					),
					'redirect' => 'home',
				),
				'create_joke' => array(
					'roles' => array(
						'admin',
						'user',
					),
					'redirect' => 'login',
				),
			),
			'admin' => array(
				'read_admin_dashboard' => array(
					'roles' => array(
						'admin',
					),
					'redirect' => 'error',
				),
			),
			'ajax' => array(
				'update_jokes_status' => array(
					'roles' => array(
						'admin',
					),
					'redirect' => 'error',
				),
				'delete_jokes' => array(
					'roles' => array(
						'admin',
					),
					'redirect' => 'error',
				),
				'update_own_infos' => array(
					'roles' => array(
						'admin', 'user',
					),
					'redirect' => 'error',
				),
				'rate_joke' => array(
					'roles' => array(
						'admin', 'user',
					),
					'redirect' => 'error',
				),
			),
		);
	}

}


?>

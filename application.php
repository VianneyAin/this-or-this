<?php

class Application {
    private $header;
    private $controller;
    private $footer;
    protected $registration;
    private $controllers = array(
        'pages',
        'posts',
        '',//homepage
        'version',
        'login',
        'connexion',
        'logout',
        'inscription',
        'profil',
        'profile',
    );

    public function __construct(){
        require_once("includes/functions/registration.php");
        $this->registration = new Registration();
        //Provide your site name here
        $this->registration->SetWebsiteName('localhost/jokes-app');

        //Provide the email address where you want to get notifications
        $this->registration->SetAdminEmail('vianney.ain.travail@gmail.com');

        //Provide your database login details here:
        //hostname, user name, password, database name and table name
        //note that the script will create the table (for example, fgusers in this case)
        //by itself on submitting register.php for the first time
        $this->registration->InitDB(/*hostname*/'localhost',
                              /*username*/'root',
                              /*password*/'',
                              /*database name*/'jokes',
                              /*table name*/'users');

        //For better security. Get a random string from this link: http://tinyurl.com/randstr
        // and put it here
        $this->registration->SetRandomKey('qSRcVS6DrTzrPvr');
    }

    public function call($controller) {
        //require_once("includes/functions/membersite_config.php");
        require_once('includes/mvc/controllers/controller.header.php');
        require_once('includes/mvc/controllers/controller.footer.php');
        $this->header = new Header_Controller();
        $this->footer = new Footer_Controller();
        switch($controller) {
            case 'home':
                require_once('includes/mvc/controllers/controller.' . $controller . '.php');
                $this->controller = new Home_Controller();
                break;
            case 'logout':
                require_once('includes/mvc/controllers/controller.' . $controller . '.php');
                $this->controller = new Logout_Controller();
                break;
            case 'login':
            case 'connexion' :
                require_once('includes/mvc/controllers/controller.login.php');
                $this->controller = new Login_Controller();
                break;
            case 'inscription' :
                require_once('includes/mvc/controllers/controller.signup.php');
                $this->controller = new Signup_Controller();
                break;
            case 'profil':
            case 'profile':
                require_once('includes/mvc/controllers/controller.profile.php');
                $this->controller = new Profile_Controller();
                break;
            case 'pages':
                require_once('includes/mvc/controllers/controller.' . $controller . '.php');
                $this->controller = new Page_Controller();
                break;
            case 'posts':
                require_once('includes/mvc/controllers/controller.' . $controller . '.php');
                $this->controller = new Post_Controller();
                break;
            case 'error':
                require_once('includes/mvc/controllers/controller.' . $controller . '.php');
                $this->controller = new Error_Controller();
                break;
            default :
                require_once('includes/mvc/controllers/controller.' . $controller . '.php');
                $this->controller = new Error_Controller();
                break;
        }

        $this->layout_request();
        $this->partials_request();
    }

    /*
    The following function will strip the script name from URL
    i.e.  http://www.something.com/search/book/fitzgerald will become /search/book/fitzgerald
    */
    public function getCurrentUri()
    {
        $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
        $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
        if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
        $uri = '/' . trim($uri, '/');
        return $uri;
    }

    public function load_pages($routes){
        if (isset($routes) && !empty($routes)){
            if (in_array($routes[0], $this->controllers)) {
                $this->call($routes[0]);
            } else {
                $this->call('error');
            }
        }
        //No routes ? Load homepage
        else {
            $this->call('home');
        }
    }

    public function layout_request(){
        //$this->header->layout_request();
        $this->controller->layout_request();
        //$this->footer->layout_request();
    }

    public function partials_request(){
        $this->header->partials_request();
        $this->controller->partials_request();
        $this->footer->partials_request();
    }

}

?>

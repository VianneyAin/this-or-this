<?php

class Application {
    private $header;
    private $controller;
    private $footer;
    protected $user_object;
    protected $registration;
    protected $permission_object;
    private $routes;
    private $actions = array(
        'header' => array(
            'display_ajax_url',
        ),
        'footer' => array(

        ),
    );

    private $controllers = array(
        '',//homepage
        'tot',
    );

    private $ajax_controllers = array(
        'ajax',
    );

    public function __construct(){
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        require_once("includes/functions/registration.php");
        require_once("includes/mvc/controllers/controller.user.php");
        require_once("permission.php");
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
        //Load user object
        $this->user_object = new User($this->registration);
        //Load permission object
        $this->permission_object = new Permission( $this->user_object );
    }

    public function call_ajax(){
        require_once('includes/mvc/controllers/controller.ajax.php');
        $this->controller = new Ajax_Controller($this->routes);
    }

    public function call($controller) {
        //require_once("includes/functions/membersite_config.php");
        require_once('includes/mvc/controllers/controller.header.php');
        require_once('includes/mvc/controllers/controller.footer.php');
        $this->header = new Header_Controller($this->actions);
        $this->footer = new Footer_Controller($this->actions);
        switch($controller) {
            case 'home':
                require_once('includes/mvc/controllers/controller.' . $controller . '.php');
                $this->controller = new Home_Controller();
                break;
            case 'tot':
                require_once('includes/mvc/controllers/controller.' . $controller . '.php');
                $this->controller = new Tot_Controller($this->routes);
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
            $this->routes = $routes;
            if ($routes[0] == 'ajax') {
                $this->call_ajax();
            }
            else  if (in_array($routes[0], $this->controllers)) {
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
        $this->header->layout_request();
        $this->controller->layout_request();
        $this->footer->layout_request();
    }

    public function partials_request(){
        $this->header->partials_request();
        $this->controller_partials_request();
        $this->footer->partials_request();
    }

    public function controller_partials_request(){
        ?>
        <main>
        <?php
            $this->controller->partials_request();
        ?>
        </main>
        <?php
    }

    public function add_action($location, $action){
        foreach($this->actions as $action_location => $action_array){
            if ($action_location == $location){
                switch ($location){
                    case 'header':
                        array_push($this->actions[$action_location], $action);
                        $this->header->update_actions($this->actions);
                        break;
                    case 'footer':
                        array_push($this->actions[$action_location], $action);
                        $this->footer->update_actions($this->actions);
                        break;
                    default :
                        die('Who are you, haxxor !');
                        break;
                }
            }
        }
    }

    public static function display_ajax_url(){
        ?>
        <script type="text/javascript">var ajaxurl = "http://localhost/jokes/ajax";</script>
        <?php
    }

    public static function cloudinary(){
        require_once( 'includes/lib/cloudinary/Cloudinary.php' );
        require_once( 'includes/lib/cloudinary/Uploader.php' );
        require_once( 'includes/lib/cloudinary/Api.php' );
    }

    public static function cloudinary_js(){
        ?>
        <script type="text/javascript" src="http://localhost//jokes/js/cloudinary/jquery.ui.widget.js"></script>
        <script type="text/javascript" src="http://localhost//jokes/js/cloudinary/jquery.iframe-transport.js"></script>
        <script type="text/javascript" src="http://localhost//jokes/js/cloudinary/jquery.fileupload.js"></script>
        <script type="text/javascript" src="http://localhost//jokes/js/cloudinary/jquery.cloudinary.js"></script>
        <?php
    }

}

?>

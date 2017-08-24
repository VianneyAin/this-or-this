<?php

class Application {
    private $header;
    private $controller;
    private $footer;

    public function call($controller) {
        require_once('includes/mvc/controllers/controller.header.php');
        require_once('includes/mvc/controllers/controller.' . $controller . '.php');
        require_once('includes/mvc/controllers/controller.footer.php');
        $this->header = new Header_Controller();
        $this->footer = new Footer_Controller();
        switch($controller) {
            case 'pages':
                $this->controller = new Page_Controller();
            break;
            case 'posts':
                $this->controller = new Post_Controller();
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
            switch ($routes[0]){
                case 'pages':
                    $controller = 'pages';
                    break;
                case 'posts':
                    $controller = 'posts';
                    break;
                default:
                    $controller = 'error';
                    break;
            }
            // we're adding an entry for the new controller and its actions
            $controllers = array(
                'pages' => ['home', 'error'],
                'posts' => ['index', 'show']
            );


            if (array_key_exists($controller, $controllers)) {
                $this->call($controller);
            } else {
                $this->call('pages');
            }
        }
        else {
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

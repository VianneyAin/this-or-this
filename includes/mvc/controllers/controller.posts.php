<?php
class Post_Controller {
    private $data;

    public function __construct(){
        // we need the model to query the database later in the controller
        require_once(dirname(__FILE__).'/../models/model.posts.php');
        require_once(dirname(__FILE__).'/../views/view.posts.php');
        $this->model = new Post_Model();
        $this->view = new Post_View();
        $this->data = $this->model->all();
    }

    public function show() {
        // we expect a url of form ?controller=posts&action=show&id=x
        // without an id we just redirect to the error page as we need the post id to find it in the database
        if (!isset($_GET['id']))
        return call('pages', 'error');

        // we use the given id to get the right post
        $post = Post::find($_GET['id']);
        require_once(dirname(__FILE__).'/../views/posts/show.php');
    }

    public function layout_request(){
    }

    public function partials_request(){
        $this->view->list_all_posts($this->data);
    }
}
?>

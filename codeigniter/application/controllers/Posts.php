<?php 

class Posts extends CI_Controller{

/**
 * 
 * Constructor function
 * 
 */
public function __construct(){

    /**
     * 
     * binds the controller to the model
     * 
     */
    parent::__construct();
    $this->load->model('post_model');
    $this->load->helper('url_helper');

}


/**
 * 
 * Displays all the posts from the database
 * 
 */
public function index(){
    /**
     * this assigns the page name to the title of the page
     * 
     */
    $data['title'] = "Latest Posts";

    $data['posts'] = $this->post_model->get_posts();

    
    /**
     * 
     * this loads the header, footer partials and the pages that is passed
     * !!order does matter!!
     * 
     */
    $this->load->view('partials/header', $data);
    $this->load->view("pages/posts/index", $data);
    $this->load->view('partials/footer');
}

/**
 * 
 * Display a specific post from the database
 * 
 * @param string $slug
 * 
 * 
 */
public function view($slug = NULL) {

    $data['post'] = $this->post_model->get_posts($slug);

    if(empty($data['post'])){
        show_404();
    }

    $data['title'] = $data['post']['title'];

     /**
     * 
     * this loads the header, footer partials and the pages that is passed
     * !!order does matter!!
     * 
     */
    $this->load->view('partials/header', $data);
    $this->load->view("pages/posts/view", $data);
    $this->load->view('partials/footer');

}
}
?>
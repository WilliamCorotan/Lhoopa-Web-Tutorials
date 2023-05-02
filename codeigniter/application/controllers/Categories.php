<?php 

class Categories extends CI_Controller{

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
    $this->load->model('category_model');
    $this->load->helper('url_helper');

}


public function index(){
    $data['title'] = "Categories";

    $data['categories'] = $this->category_model->get_categories();

    $this->load->view('partials/header', $data);
    $this->load->view("pages/categories/index", $data);
    $this->load->view('partials/footer');
}


public function create(){
    /**
 * 
 * loads form helper and  form validation
 * 
 */
$this->load->helper('form');
$this->load->library('form_validation');

    $data['title'] = "Create Category";

    $this->form_validation->set_rules('name', 'Name', 'required');

    if($this->form_validation->run() === FALSE){
        $this->load->view('partials/header', $data);
        $this->load->view("pages/categories/create", $data);
        $this->load->view('partials/footer');
    }
    else{
        $this->category_model->create();
        redirect('categories');
    }
}

public function posts($id){
    $data['title'] = $this->category_model->get_category($id)->name;

    $data['posts'] = $this->post_model->filter_category($id);

    $this->load->view('partials/header', $data);
    $this->load->view("pages/posts/index", $data);
    $this->load->view('partials/footer');
}

}

?>
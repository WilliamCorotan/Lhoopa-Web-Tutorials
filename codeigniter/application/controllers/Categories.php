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
//redirects to login in if not authenticate
if(!$this->session->userdata('logged_in')){
    redirect('users/login');
}

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

public function posts($id, $offset = 0){
    
    $this->load->library('pagination');
    $query = $this->post_model->filter_category($id);
    $config['base_url'] = base_url() . "categories/posts/$id/";
    $config['total_rows'] = count($query);
    $config['per_page'] = 4;
    $config['uri_segment'] = 4;
    $config['attributes'] = array('class' => 'page-link');
    
    $this->pagination->initialize($config);

    $data['title'] = $this->category_model->get_category($id)->name;
    
    $data['posts'] = $this->post_model->filter_category($id,  $config['per_page'], $offset);
    

    $this->load->view('partials/header', $data);
    $this->load->view("pages/posts/index", $data);
    $this->load->view('partials/footer');
}

}

?>
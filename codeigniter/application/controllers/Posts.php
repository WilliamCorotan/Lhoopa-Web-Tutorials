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
    $this->load->model('comment_model');
    $this->load->helper('url_helper');

}


/**
 * 
 * Displays all the posts from the database
 * 
 */
public function index($offset = 0){

    $this->load->library('pagination');

    $config['base_url'] = base_url() . '/posts/index/';
    $config['total_rows'] = $this->db->count_all('posts');
    $config['per_page'] = 4;
    $config['uri_segment'] = 3;
    $config['attributes'] = array('class' => 'page-link');


    $this->pagination->initialize($config);
    /**
     * this assigns the page name to the title of the page
     * 
     */
    $data['title'] = "Latest Posts";

    $data['posts'] = $this->post_model->get_posts(FALSE, $config['per_page'], $offset);

    
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
    $this->load->helper('form');
    $data['post'] = $this->post_model->get_posts($slug);
    $post_id = $data['post']['id'];
    $data['comments'] = $this->comment_model->get_comments($post_id);


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


    $data['title'] = "Create Post";
    $data['categories'] = $this->post_model->get_categories();
    /**
     * 
     * Setting form validation rules
     * 
     */
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('body', 'Body', 'required');

    if($this->form_validation->run() === FALSE){
        /**
        * 
        * this loads the header, footer partials and the pages that is passed
        * !!order does matter!!
        * 
        */
       $this->load->view('partials/header', $data);
       $this->load->view("pages/posts/create", $data);
       $this->load->view('partials/footer');
    }
    else{
        /**
         * 
         * file upload configurations
         * 
         */
        $config['upload_path'] = './assets/images/posts/';
        $config['allowed_types'] = 'gif|jpg|png|';
        $config['max_size'] = '2048';
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        
        // print_r($_FILES);
        // die();
        
        if( ! $this->upload->do_upload('image')){
            $errors = array('error' => $this->upload->display_errors());
            $post_image = 'noimage.png';
            print_r($errors);

        }
        else{
            $data = array('upload_data' => $this->upload->data());
            $post_image = $data['upload_data']['file_name'];

            print_r($data['upload_data']['file_name']);
            
        }
        $this->post_model->insert($post_image);
        $this->session->set_flashdata('toast_data_danger', false);
        $this->session->set_flashdata('toast_data_title', 'Created Post Successfully!');
        $this->session->set_flashdata('toast_data_body', 'Your post has been created successfully!');
        redirect('posts');
    }
} 

public function edit($slug)
{
    //redirects to login in if not authenticate
    if(!$this->session->userdata('logged_in')){
        redirect('users/login');
    }
    
    if($this->session->userdata('user_id') !== $this->post_model->get_posts($slug)['user_id']){
        redirect('posts');
    }
    $this->load->helper('form');
    $data['post'] = $this->post_model->get_posts($slug);
    $data['categories'] = $this->post_model->get_categories();
    if(empty($data['post'])){
        show_404();
    }

    $data['title'] = "Edit Post - $slug";



     /**
     * 
     * this loads the header, footer partials and the pages that is passed
     * !!order does matter!!
     * 
     */
    $this->load->view('partials/header', $data);
    $this->load->view("pages/posts/edit", $data);
    $this->load->view('partials/footer');

}

public function update(){
    //redirects to login in if not authenticate
    if(!$this->session->userdata('logged_in')){
        redirect('users/login');
    }

   $this->post_model->update();
   $this->session->set_flashdata('toast_data_danger', false);
   $this->session->set_flashdata('toast_data_title', 'Post Updated Successfully!');
    $this->session->set_flashdata('toast_data_body', 'Your post has been updated successfully!');
   redirect('posts');
}

public function delete($id)
{
    //redirects to login in if not authenticate
    if(!$this->session->userdata('logged_in')){
        redirect('users/login');
    }

    $this->post_model->delete($id);
    $this->session->set_flashdata('toast_data_danger', true);
    $this->session->set_flashdata('toast_data_title', 'Post Deleted Successfully!');
    $this->session->set_flashdata('toast_data_body', 'Your post has been deleted!');
    redirect('posts');
}


public function get_categories(){
   $this->db->query('SELECT posts.category_id, category.id FROM posts LEFT JOIN categories where posts.category_id = categories.id');
}
}
?>
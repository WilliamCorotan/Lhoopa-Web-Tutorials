<?php 

class Comments extends CI_Controller{


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
    $this->load->model('comment_model');
    $this->load->helper('url_helper');

}

    public function create($post_id){
        $this->load->library('form_validation');

        $slug = $this->input->post('slug');

        $data['post']  = $this->post_model->get_posts($slug);
        $data['title'] = $data['post']['title'];
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('body', 'Body', 'required');

        if($this->form_validation->run() === FALSE){
            $this->load->view('partials/header', $data);
            $this->load->view("pages/posts/view", $data);
            $this->load->view('partials/footer');
        }
        else{
            $this->comment_model->create($post_id);
            redirect('posts/'.$slug);
        }
    }
}

?>
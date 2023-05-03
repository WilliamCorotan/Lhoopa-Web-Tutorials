<?php 

class Users extends CI_Controller{

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
    $this->load->model('user_model');
    $this->load->helper('url_helper');

}
    /**
     * 
     * Registers the users
     * Passes the form fields through validations.
     * 
     */
    public function register(){
        $this->load->library('form_validation');

        $data['title'] = 'Sign Up';

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('username', 'username', 'required|callback_check_username_exists');
        $this->form_validation->set_rules('email', 'email', 'required|callback_check_email_exists');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('confirm_password', 'confirm password', 'matches[password]');

        if($this->form_validation->run() === FALSE){
            $this->load->view('partials/header', $data);
            $this->load->view("auth/register", $data);
            $this->load->view('partials/footer');
        }
        else{
            $enc_password = md5($this->input->post('password'));
            $this->user_model->register($enc_password);
            $this->session->set_flashdata('toast_data_danger', false);
            $this->session->set_flashdata('toast_data_title', 'Registered Successfully!');
            $this->session->set_flashdata('toast_data_body', 'You are now registered and now can login!');
            redirect('posts');
        }
    }

    /**
     * 
     * custom username validation
     * Check if the username is unique
     * 
     */
    function check_username_exists($username){
        $this->form_validation->set_message('check_username_exists', 'This username is taken.');

        if($this->user_model->check_username_exists($username)){
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * 
     * custom email validation
     * Check if the email is unique
     * 
     */
    function check_email_exists($email){
        $this->form_validation->set_message('check_email_exists', 'This email is taken.');

        if($this->user_model->check_email_exists($email)){
            return true;
        }
        else{
            return false;
        }
    }

}

?>
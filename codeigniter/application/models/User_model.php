<?php 

class User_Model extends CI_Model{
    
    /**
     * 
     * This is a constructor that 
     * Load here your libraries, models, helpers
     * 
     */
    public function __construct()
    {   
        parent::__construct();
        $this->load->database();
    }

    /**
     * 
     * Registers the users. Inserts to the database
     * 
     * @param string $enc_password
     * 
     */
    public function register($enc_password) {
        $data = array(
            'name' => $this->input->post('name'),
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => $enc_password,
            'zipcode' => $this->input->post('zipcode')
        );

        return $this->db->insert('users', $data);
    }


    public function login($username, $password){
        $this->db->where('username', $username);
        $this->db->where('password', $password);

        $result  = $this->db->get('users');

        if($result->num_rows() === 1){
            return $result->row(0)->id;
        }
        else{
            return false;
        }
    }
    /**
     * 
     * Checks if username exists in the database
     * 
     * @param string $username 
     * 
     * 
     */
    public function check_username_exists($username){
        $query = $this->db->get_where('users', array('username' => $username));
        if(empty($query->row_array())){
            return true;
        }
        else {
            return false;
        }
    }

    /**
     * 
     * Checks if email exists in the database
     * 
     * @param string $email 
     * 
     * 
     */
    public function check_email_exists($email){
        $query = $this->db->get_where('users', array('email' => $email));
        if(empty($query->row_array())){
            return true;
        }
        else {
            return false;
        }
    }
}

?>
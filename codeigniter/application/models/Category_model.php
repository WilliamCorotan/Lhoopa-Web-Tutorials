<?php 

class Category_model extends CI_Model
{

public function __construct()
{
    parent::__construct();
    $this->load->model('post_model');
    $this->load->database();
}

public function get_categories()
{
    $query = $this->db->get('categories');
    // echo "<pre>";
    // print_r($query->result_array());
    // die();
    return $query->result_array();
}


public function get_category($id){
    $query = $this->db->get_where('categories', array('id' => $id));
    return $query->row();
}
public function create()
{
    $data = array(
        'name' => $this->input->post('name')
    );

    return $this->db->insert('categories', $data);
}



}
?>
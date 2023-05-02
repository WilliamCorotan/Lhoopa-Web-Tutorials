<?php 

class Category_model extends CI_Model
{

public function __contruct()
{
    parent::__construct();
    $this->load->model('post_model');
    $this->load->database();
}

public function create()
{
    
}

public function get_categories()
{
    $query = $this->db->order_by("posts.id", "DESC")->get('posts');
    return $query->result_array();
}

}
?>
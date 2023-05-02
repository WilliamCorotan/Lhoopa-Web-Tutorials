<?php

class Post_model extends CI_Model {

    /**
     * 
     * this is a contructor that 
     * 
     */
    public function __construct()
    {   
        parent::__construct();
        $this->load->model('category_model');
        $this->load->database();
    }

    public function get_posts($slug = FALSE)
    {
        /**
         * 
         * gets all the posts from the database
         * 
         */
        if ($slug === FALSE) {
            $query = $this->db->order_by("posts.id", "DESC")->join('categories', 'posts.category_id = categories.id')->get('posts');
            return $query->result_array();
        }

        /**
         * 
         * gets specific post based on the slug given
         * 
         */
        $query = $this->db->get_where('posts', array('slug' => $slug));
        return $query->row_array();

    }

    public function insert($post_image)
    {
        $slug = url_title($this->input->post('title'));

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'body' => $this->input->post('body'),
            'category_id' => $this->input->post('category_id'),
            'image' => $post_image
        );

        return $this->db->insert('posts', $data);
    }

    public function update(){
        $slug = url_title($this->input->post('title'));
        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'body' => $this->input->post('body'),
            'category_id' => $this->input->post('category_id')
        );
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('posts', $data);
         
    }

    public function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('posts');
        return true;
    }

    public function get_categories(){
      $this->db->order_by('name');
      $query = $this->db->query('SELECT DISTINCT categories.id, categories.name FROM posts right JOIN categories ON posts.category_id = categories.id');
      return $query->result_array();
    }

    public function filter_category($id){
        $this->db->order_by('posts.id', 'DESC');
        $this->db->join('categories', 'categories.id = posts.category_id');
        $query = $this->db->get_where('posts', array('category_id' => $id));
    //     echo "<pre>";
    // print_r($query->result_array());
    // die();
        return $query->result_array();
    }
}
<?php

class Post_model extends CI_Model {

    /**
     * 
     * this is a contructor that 
     * 
     */
    public function __construct()
    {   
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
            $query = $this->db->order_by("id", "DESC")->get('posts');
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

    public function insert()
    {
        $slug = url_title($this->input->post('title'));

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'body' => $this->input->post('body'),
        );

        return $this->db->insert('posts', $data);
    }

}
<?php 

class Pages extends CI_Controller{

public function view($page = 'home'){

    /**
     * check if the pages exists or not
     * 
     */ 
    if(!file_exists(APPPATH."views/pages/$page.php")){
        show_404();
    }

    /**
     * this assigns the page name to the title of the page
     * 
     */
    $data['title'] = ucfirst($page);

    /**
     * 
     * this loads the header, footer partials and the pages that is passed
     * !!order does matter!!
     * 
     */
    $this->load->view('partials/header', $data);
    $this->load->view("pages/$page", $data);
    $this->load->view('partials/footer');
}
}
?>
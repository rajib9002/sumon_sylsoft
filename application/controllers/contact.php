<?php

class contact extends Controller {

    var $dir = "contact";

    public function __construct() {
        parent::__construct();
        $this->load->model("mod_contact");
        $this->load->Model("mod_product");
    }

    function index() {
        if ($_REQUEST['submit']) {

            if ($this->form_validation->run('valid_contact')) {

                if ($this->mod_contact->save_contact()) {
                    redirect("contact/message");
                }
            }
        }
        $data['dir'] = $this->dir;
        $data['title']='Contact';
        $data['page'] = 'contact_form';
        $this->load->view("main", $data);
    }

    function message() {
        $data['dir'] = $this->dir;
        $data['title']='Contact';
        $data['page'] = 'message';
        $this->load->view('main', $data);
    }

}

?>
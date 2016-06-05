<?php

class contents extends Controller {

    public function __construct() {
        parent::Controller();
        $this->load->Model("mod_home");
        $this->load->Model("mod_product");
    }
 function about_us() {
        $data['title'] = 'About Us';
        $data['dir'] = 'static';
        $data['page'] = 'about_us';
        $this->load->view("static_main", $data);
    }
    function terms_and_condition() {
        $data['title'] = 'Terms And Condition';
        $data['dir'] = 'static';
        $data['page'] = 'terms_and_condition';
        $this->load->view("static_main", $data);
    }

    function help() {
        $data['title'] = 'Help';
        $data['dir'] = 'static';
        $data['page'] = 'help';
        $this->load->view("static_main", $data);
    }

    function privacy_policy() {
        $data['title'] = 'Privacy Of Our Shop';
        $data['dir'] = 'static';
        $data['page'] = 'privacy_policy';
        $this->load->view("static_main", $data);
    }
 function fragrance_list() {
        $data['title'] = 'Fragrance List';
        $data['dir'] = 'static';
        $data['page'] = 'fragrance_list';
        $this->load->view("static_main", $data);
    }
    function home_fragrance_list() {
        $data['title'] = 'Home Fragrance List';
        $data['dir'] = 'static';
        $data['page'] = 'home_fragrance_list';
        $this->load->view("static_main", $data);
    }




}

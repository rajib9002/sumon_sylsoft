<?php

class static_pages extends Controller {

    function __construct() {
        parent::Controller();
        common::is_logged();
        $this->load->helper('file');
    }

    function index($page="about_us") {
        $data['content'] = $page;
        $data['page_title'] = "Previewing <b>" . $page . "</b> page";
        $data['dir'] = "static_pages";
        $data['page'] = "index";
        $this->load->view('main', $data);
    }

    function edit() {
        $page = $this->uri->segment(3);
        $data['content'] = $page;
        $data['page_title'] = "You Are Editing <b>" . $page . "</b> Page";
        $data['editor'] = TRUE;
        $data['dir'] = "static_pages";
        $data['page'] = "edit";
        $this->load->view('main', $data);
    }

    function save() {
        $page = $this->uri->segment(3);
        write_file(FRONT_END . "views/static/" . $page . ".php", $_POST['static_content'], "w+");
        redirect('static_pages/' . $page);
        exit;
    }

    function about_us() {
        $this->index("about_us");
    }

    function terms_and_condition() {
        $this->index("terms_and_condition");
    }

    function privacy_policy() {
        $this->index("privacy_policy");
    }
    
    function welcome() {
        $this->index("welcome");
    }

    function help(){
        $this->index("help");
    }
 function fragrance_list(){
        $this->index("fragrance_list");
    }
    function home_fragrance_list(){
        $this->index("home_fragrance_list");
    }

} ?>
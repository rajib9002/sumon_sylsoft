<?php

class home extends Controller {

    function __construct() {
        parent::Controller();
        common::is_logged();
    }

    function index() {
        $data['dir'] = 'home';
        $data['page'] = 'index';
        $data['title'] = 'Home';
        $this->load->view('main', $data);
    }

}
?>

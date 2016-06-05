<?
class state extends Controller{

    public function __construct() {
        parent::Controller();
        $this->load->model('mod_state');
        if (common::is_logged());
         
    }

     function index(){
        $this->load->library('grid');
        $gridObj = new grid();
        $gridColumn = array("State Name", "State Shipping Value", "Status");
        $gridColumnModel = array(
            array("name" => "state_name",
                "index" => "state_name",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            ),
            array("name" => "shipping_state",
                "index" => "shipping_state",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            ),
            array("name" => "status",
                "index" => "status",
                "width" => 150,
                "sortable" => true,
                "align" => "center",
                "editable" => false
            ),
            

        );

        $gridObj->setGridOptions("Satae Shipping Value", 880, 200, "state_id", "asc", $gridColumn, $gridColumnModel, site_url('state/load_data'), true);



        $data['nav_array'] = array(
            array('title' => 'Manage State', 'url' => '')
        );
        $data['menu'] = true;
        $data['grid_data'] = $gridObj->getGrid();
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = 'state';
        $data['page']= 'index';
        $this->load->view('main', $data);
    }


     function load_data() {
       $this->mod_state->get_all_state();
    }


    function add_state(){
        if ($_POST['save']) {
                $this->mod_state->add_state(); //Don't Change
                $this->session->set_flashdata('msg',"State added Successfully");
                redirect('state');

        }

        $data['nav_array'] = array(
            array('title' =>"Add New State", 'url' => site_url('state/add_state')),
            array('title' =>"Add New State", 'url' => '')
        );
        //$this->session->unset_userdata('edit_success_id'); //Don't Change
        $data['msg'] = $this->session->flashdata('msg');
        $data['dir'] = 'state';
        $data['page'] = 'add_state'; //Don't Change
        $data['page_title'] = "Add New State";
        $data['action'] = 'state/add_state';
        $this->load->view('main', $data);


    }


    function edit_state($state_id){

       $data = sql::row('state', "state_id='$state_id'");
        if ($_POST['save']) {
            $this->mod_state->update_state($state_id);
            $this->session->set_flashdata('msg',"State updated successfully");
            redirect('state');
        }
        $data['nav_array'] = array(
            array('title' =>"State", 'url' => site_url('state')),
            array('title' => "Edit State", 'url' => '')
        );
        $data['dir'] = 'state';
        $data['action'] = 'state/edit_state/' . $data['state_id'];
        $data['page'] = 'add_state'; //Don't Change
        $data['page_title'] = "Edit state";
        $this->load->view('main', $data);

    }

    function delete_state($state_id){
        if ($state_id == '') {
            redirect('state');
        }
       $this->mod_state->delete_state($state_id);
       $this->session->set_flashdata('msg',"State deleted successfully");
       redirect('state');
    }

}


?>
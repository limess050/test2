<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends MY_Controller {
    var $user_details;
    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->load->view('admin/index');
    }
	public function blocks() {
	
        $this->load->view('admin/blocks');
    }
	public function getblocks()
    {
        echo $this->admin_model->getblocks();
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
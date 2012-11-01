<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index()
    {
        if(isset($_ENV['myvar']))
        {
            if (!$this->session->userdata('user_details'))
            {
                $data = array();
                if(!empty($_POST))
                {
                    if($this->booking_model->login($_POST))
                    {
                        redirect('home');
                    }
                    else
                    {
                        $data['msg'] = 'invalid';
                    }
                }
                $this->load->view('login',$data);
            }
            else
            {
                redirect('home');
            }
        }
        else
        {
            echo "You don't have access to the system, Please contanct Administrator";die;
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}
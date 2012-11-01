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
<<<<<<< HEAD
					$this->user_details = unserialize($this->session->userdata('user_details'));
					if($this->user_details->emp_role==4)
					redirect('home');
					else
					redirect('admin');
                }
                else
                {
                    $data['msg'] = 'invalid';
=======
                    if($this->booking_model->login($_POST))
                    {
                        redirect('home');
                    }
                    else
                    {
                        $data['msg'] = 'invalid';
                    }
>>>>>>> e71692dcd27f486c29c2037427dd48a59ca50950
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
<<<<<<< HEAD
          $this->user_details = unserialize($this->session->userdata('user_details'));
		  if($this->user_details->emp_role==4)
		   redirect('home');
		  else
		  redirect('admin'); 
=======
            echo "You don't have access to the system, Please contanct Administrator";die;
>>>>>>> e71692dcd27f486c29c2037427dd48a59ca50950
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

}
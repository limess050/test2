<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends MY_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index()
    {
        $data['today'] = date('d-m-Y');
        $data['tomorrow'] = date('d-m-Y', time()+86400);
        $data['master_data'] = $this->booking_model->getMasterData();
        $data['session_id'] = MD5($this->session->userdata('session_id'));
        $this->load->view('booking/index',$data);
    }

    public function roomBooking()
    {
        if (formtoken::validateToken($_POST)) {
            $date_fields_array = array('from_date','to_date');
            foreach($date_fields_array as $val)
            {
                if(isset($_POST[$val]))
                {
                    $_POST[$val] = date('Y-m-d',strtotime($_POST[$val]));
                }
            }
            $_POST['checkout_date'] = $_POST['to_date'];
			$_POST['created_by'] = 1;
			$_POST['created_date'] =  date("Y-m-d H:i:s");
			$_POST['modified_by'] = 1;
			$_POST['modified_date'] = date("Y-m-d H:i:s");
			$_POST['ipaddress'] = ipaddress();
			$_POST['received_by'] = 1;
			$_POST['received_date'] =  date("Y-m-d H:i:s");
			$_POST['total_amount_paid'] =  $_POST['deposit_amt']+$_POST['rent_amount']+$_POST['advance_amount'];
			$app_id = $this->booking_model->save_booking($_POST);
			redirect("booking/ticket/$app_id");
			//$this->ticket($app_id);
        }
        else {
            die('The form is not valid or has expired.');
        }
    }

    public function getAvaliableBlocksRooms()
    {
        $data = $this->booking_model->getAvaliableBlocksRooms($_POST);
        header('content-type:application/json');
        echo json_encode($data);
    }

    public function getRoomBookingDates()
    {
        $data = $this->booking_model->getRoomBookingDates($_POST);
        header('content-type:application/json');
        echo json_encode($data);
    }
    
    public function libhelp()
    {
        //$tbl_array = array('users','users_address','users_contacts','users_ecurrencies','users_settings');
        $tbl_array = array('receipts');
        $data = $this->booking_model->gettabledetails($tbl_array);
        /*echo '<pre>';
        print_r($data);*/
        foreach($data as $key=>$val)
        {
            echo 'private $'.$key.';<br>';
        }
    }

    public function updateTriggerHelp()
    {
        $rs = $this->db->query('show tables');
        echo '<pre>';
        foreach($rs->result() as $tables)
        {
            //echo $tables->Tables_in_edealspot.'<br>';
            echo $this->users_model->myTriggers($tables->Tables_in_edealspot).'<br><br><br><br>';
        }
        //die;

        //echo $qry;
    }

    public function insertTriggerHelp()
    {
        $rs = $this->db->query('show tables');
        echo '<pre>';
        foreach($rs->result() as $tables)
        {
            //echo $tables->Tables_in_edealspot.'<br>';
            echo $this->users_model->myTriggersInsert($tables->Tables_in_edealspot).'<br><br><br><br>';
        }
        //die;

        //echo $qry;
    }

    public function deleteTriggerHelp()
    {
        $rs = $this->db->query('show tables');
        echo '<pre>';
        foreach($rs->result() as $tables)
        {
            //echo $tables->Tables_in_edealspot.'<br>';
            echo $this->users_model->myTriggersDelete($tables->Tables_in_edealspot).'<br><br><br><br>';
        }
        //die;

        //echo $qry;
    }

    public function getDates()
    {
        $sql="SELECT dates FROM holidaydates";
        $result = $this->db->query($sql);
        //$chkdate = $_POST['chkdate'];
        $str='';
        while($row = mysql_fetch_array($result))
        {
            $str .=$row[0].'';
        }
        echo $str;
    }
	
	public function getDayReport()
    {
        $date = date('Y-m-d');
		$data = $this->booking_model->getDayReport($date);
		$data['user_name'] = 'Kumar';
		$data['date'] = $date;
		//echo '<pre>'; print_r($data); die;
		$this->load->view('reports/index',$data);
    }
	public function ticket($app_id = 12)
    {
        $where_cond = ' ad.id='.$app_id;
		$data['booking_det'] = $this->booking_model->getBookingDetails($where_cond);
//echo '<pre>';		print_r($data);die;
		$data['user_name'] = 'Kumar';
		$this->load->view('booking/ticket',$data);
    }
	
	public function checkOut()
    {
        $this->load->view('checkout/index');
    }
	public function getBookingDetails()
    {
        $app_id = 1231;//$_POST['application_id']
		$booking_details = $this->booking_model->getBookingDetails($app_id);
		$data['booking_details'] = $booking_details;
		$this->load->view('checkout/checkout_details',$data,true);
		echo '<pre>'; print_r($booking_details); die;
		//$this->load->view('checkout/index');
    }
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
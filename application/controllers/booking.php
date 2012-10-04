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
            $this->booking_model->save_booking($_POST);
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
    
    public function add_page($page_id=0)
    {}
    public function save_page()
    {}
    public function getpagesdata()
    {}

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
        echo rtrim($str);
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
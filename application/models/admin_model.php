<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author RAJU
 */
class Admin_model extends MY_Model {
//put your code here
    public function __construct() {
        parent::__construct();
    }

	function getblocks()
	{
		$sql = 'SELECT id,name,
				CASE WHEN status =1 THEN "Active" ELSE "Inactive" END as status 
				FROM blocks';    
        $data_flds = array('name','status');
		if($this->user_details->emp_role==1)
		{
		$data_flds = array('name','status',"<a class='btn edit_ecur' href='".site_url()."admin/blockView/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Edit</span></span></a>");
		}
		
		return $this->display_grid($_POST,$sql,$data_flds);
	}
	
	
	
	function blockView($id=0)
    {
        $sql = 'SELECT * FROM blocks where id='.$id;
        return $this->getDBResult($sql, 'object');
    }
	function addBlock($post)
    {
        if($post['id'])
        {
            return $this->saveRecord(conversion($post,'blocks_lib'),'blocks',array('id'=>$post['id']));
        }
        else
        {
            return $this->saveRecord(conversion($post,'blocks_lib'),'blocks');
        }
    }
	function getrooms()
	{
		$search_qry = ' AND blocks_id = 1';
		if(isset($_POST['blocks_id']) && $_POST['blocks_id']!='')
		{
			$search_qry = ' AND blocks_id = '.$_POST['blocks_id'];
		}
        $sql = 'select id,name, blocks_id, vip_quota, deposit_amt, rent_amt,
				CASE WHEN vip_quota =1 THEN "Yes" ELSE "No" END as vipquota , 
				CASE WHEN status =1 THEN "Active" ELSE "Inactive" END as status  from rooms r
				where 1 '.$search_qry;    
        $data_flds = array('name','vipquota','deposit_amt','rent_amt','status');
		if($this->user_details->emp_role==1)
		{
			$data_flds = array('name','vipquota','deposit_amt','rent_amt','status',"<a class='btn edit_ecur' href='".site_url()."admin/roomview/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Edit</span></span></a>");
		}
		
		return $this->display_grid($_POST,$sql,$data_flds);
	}
	function roomview($id=0)
    {
        $sql = 'SELECT * FROM rooms where id='.$id;
        return $this->getDBResult($sql, 'object');
    }
	function addRoom($post)
    {
        if($post['id'])
        {
            return $this->saveRecord(conversion($post,'rooms_lib'),'rooms',array('id'=>$post['id']));
        }
        else
        {
            return $this->saveRecord(conversion($post,'rooms_lib'),'rooms');
        }
    }
	
	//users SET
	function getusers()
	{
		$sql = 'SELECT u.id,concat(u.emp_fname," ",u.emp_lname) as emp_name, u.emp_id, u.user_name, u.password, u.emp_role as emp_role,r.name as role,
				CASE WHEN u.status =1 THEN "Active" ELSE "Inactive" END as status 
				FROM users u
				LEFT JOIN roles r on u.emp_role = r.id 
				where u.emp_role!=1 ';    
				
        $data_flds = array('emp_name','emp_id','role','user_name','status');
		if($this->user_details->emp_role==1)
		{
			$data_flds = array('emp_name','emp_id','role','user_name','status',"<a class='btn edit_ecur' href='".site_url()."admin/userview/{%id%}' id='{%id%}'><span class='inner-btn'><span class='label'>Edit</span></span></a>");
		}
		return $this->display_grid($_POST,$sql,$data_flds);
	}
	
	function userView($id=0)
    {
        $sql = 'SELECT * FROM users where id='.$id;
        return $this->getDBResult($sql, 'object');
    }
	function addoperator($post)
    {
        if($post['id'])
        {
            return $this->saveRecord(conversion($post,'users_lib'),'users',array('id'=>$post['id']));
        }
        else
        {
            return $this->saveRecord(conversion($post,'users_lib'),'users');
        }
    }
	
	function changePassword($post)
    {
        $sql = 'select password from users where id = '.$post['users_id'];
        $data = $this->getDBResult($sql, 'object');
        if($post['old_pwd'] === $data[0]->password)
        {
            $update_sql = 'update users set password = '.$post['new_pwd']. ' where id = '.$post['users_id'];
            if($this->db->query($update_sql))
            {
                return 'success';
            }
            else
            {
                return 'fail';
            }
        }
        else
        {
            return 'invalid';
        }
    }
	
	
	function display_grid($postvals,$sql,$array_fields) {
        return $this->jqgrid($postvals,$sql,$array_fields);
    }
	
	
	function gettabledetails($tablenames=array())
    {
        $tbl_fields = new stdclass();
        foreach($tablenames as $tablename)
        {
            $sql = "show columns from `".$tablename."`";
            $fields = $this->getDBResult($sql, 'object');
            foreach($fields as $values)
            {
                $fld = $values->Field;
                $tbl_fields->$fld = '';
            }
        }
        return $tbl_fields;
    }
}
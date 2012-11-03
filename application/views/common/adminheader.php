<?php //print_r($this->user_details); die;?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" align="center" class="footer_text"><img src="<?php echo base_url();  ?>public/images/logo.png" /></td>
	</tr>
	<tr>
	  <td width="51%" align="center" bgcolor="#BFA06B" class="footer_text">
	  <table width="72%" border="0" align="left" cellpadding="5" cellspacing="0">
	    <tr>
	      <td width="16%"><table width="51" border="0" align="left" cellpadding="0" cellspacing="0">
	        <tr>
	          <td width="4" align="left" valign="middle">&nbsp;</td>
	          <td width="47" height="25" align="left" valign="middle"  ><a href="<?php echo base_url();?>admin/blocks" class="white_heading_txt_16px">Blocks</a></td>
	          </tr>
	        <tr>
	          <td height="1" colspan="2" ></td>
	          </tr>
          </table></td>
		  <td width="16%"><table width="49" border="0" align="left" cellpadding="0" cellspacing="0">
	        <tr>
	          <td width="4" align="left" valign="middle">&nbsp;</td>
	          <td width="45" height="25" align="left" valign="middle" ><a href="<?php echo base_url();?>admin/rooms" class="white_heading_txt_16px">Rooms</a></td>
	          </tr>
	        <tr>
	          <td height="1" colspan="2" ></td>
	          </tr>
          </table></td>	
		  <td width="17%">
		  <table width="17%" border="0" align="left" cellpadding="0" cellspacing="0">
	        <tr>
	          <td width="5" align="left" valign="middle">&nbsp;</td>
	          <td width="71" height="25" align="left" valign="middle"  ><a href="<?php echo base_url();?>admin/users" class="white_heading_txt_16px">Users</a></td>
	          </tr>
	        <tr>
	          <td height="1" colspan="2" ></td>
	          </tr>
          </table></td>
	      <td width="51%">
		  <table width="166" border="0" align="left" cellpadding="0" cellspacing="0">
	        <tr>
	          <td width="4" align="left" valign="middle">&nbsp;</td>
	          <td width="162" height="25" align="left" valign="middle"  ><a href="<?php echo base_url();?>admin/getDayReport" class="white_heading_txt_16px">Operator Day Report</a></td>
	          </tr>
	        <tr>
	          <td height="1" colspan="2" ></td>
	          </tr>
          </table></td>
		  <td width="51%">
		  <table width="166" border="0" align="left" cellpadding="0" cellspacing="0">
	        <tr>
	          <td width="4" align="left" valign="middle">&nbsp;</td>
	          <td width="162" height="25" align="left" valign="middle"  ><a href="<?php echo base_url();?>admin/get_app_details" class="white_heading_txt_16px">Application  Details</a></td>
	          </tr>
	        <tr>
	          <td height="1" colspan="2" ></td>
	          </tr>
          </table></td>
			
        </tr>
      </table></td>
	  <td width="49%" align="center" bgcolor="#BFA06B" class="footer_text">
      <table  border="0" align="right" cellpadding="0" cellspacing="0" width="70%">
	    <tr>
	      <td width="172" align="right" valign="middle"><?php echo ucfirst($this->user_details->emp_fname).' '.$this->user_details->emp_lname?></td>
		 
              <?php
                if ($this->session->userdata('user_details'))
                {
              ?>
              <td width="119" height="25" align="right" valign="middle"><a href="<?php echo base_url();?>admin/changepwd" class="white_bold_txt_12px jlo">Change Password</a></td>
			  <td width="55" height="25" align="right" valign="middle"><a href="<?php echo base_url();?>login/logout" class="white_bold_txt_12px jlo">LogOut</a></td>
              <?php
                }
                else
                {
              ?>
	      <td width="40" height="25" align="right" valign="middle"><a href="<?php echo base_url();?>login" class="white_bold_txt_12px jli">Login</a></td>
              <?php
                }
              ?>
           <td width="21" align="left" valign="middle">&nbsp;</td>
        </tr>
	    <tr>
	      <td height="1" colspan="2" ></td>
        </tr>
      </table></td>
  </tr>
</table>



<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" align="center" class="footer_text"><img src="<?php echo base_url();  ?>public/images/logo.png" /></td>
	</tr>
	<tr>
	  <td align="center" bgcolor="#BFA06B" class="footer_text"><table width="60%" border="0" align="left" cellpadding="5" cellspacing="0">
	    <tr>
	      <td width="10%"><table width="68" border="0" align="left" cellpadding="0" cellspacing="0">
	        <tr>
	          <td width="7" align="left" valign="middle">&nbsp;</td>
	          <td width="76" height="25" align="left" valign="middle" ><a href="<?php echo base_url();?>home" class="white_heading_txt_16px">Home </a></td>
	          </tr>
	        <tr>
	          <td height="1" colspan="2" ></td>
	          </tr>
	        </table></td>
	      
	      <td width="10%"><table width="120" border="0" align="left" cellpadding="0" cellspacing="0">
	        <tr>
	          <td width="5" align="left" valign="middle">&nbsp;</td>
	          <td width="132" height="25" align="left" valign="middle"  ><a href="<?php echo base_url();?>booking" class="white_heading_txt_16px">Book a Room</a></td>
	          </tr>
	        <tr>
	          <td height="1" colspan="2" ></td>
	          </tr>
	        </table></td>
		  <td width="10%"><table width="104" border="0" align="left" cellpadding="0" cellspacing="0">
	        <tr>
	          <td width="5" align="left" valign="middle">&nbsp;</td>
	          <td width="125" height="25" align="left" valign="middle" ><a href="<?php echo base_url();?>booking/checkOut" class="white_heading_txt_16px">Check Out  </a></td>
	          </tr>
	        <tr>
	          <td height="1" colspan="2" ></td>
	          </tr>
	        </table></td>	
	      <td width="39%"><table width="106" border="0" align="left" cellpadding="0" cellspacing="0">
	        <tr>
	          <td width="5" align="left" valign="middle">&nbsp;</td>
	          <td width="101" height="25" align="left" valign="middle"  ><a href="<?php echo base_url();?>booking/getDayReport" class="white_heading_txt_16px">Day Report</a></td>
	          </tr>
	        <tr>
	          <td height="1" colspan="2" ></td>
	          </tr>
	        </table></td>
			<td width="10%"><table width="160" border="0" align="left" cellpadding="0" cellspacing="0">
                            <tr>
                                <td width="5" align="left" valign="middle">&nbsp;</td>
                                <td width="142" height="25" align="left" valign="middle"  ><a href="<?php echo base_url();?>booking/pendingCheckout" class="white_heading_txt_16px">Pending Checkout<span style="color:#C92020">(5)</span></a></td>
                            </tr>
                            <tr>
                                <td height="1" colspan="2" ></td>
                            </tr>
                        </table></td>
        </tr>
      </table></td>
	  <td align="center" bgcolor="#BFA06B" class="footer_text">
      <table border="0" align="right" cellpadding="0" cellspacing="0" width="70%">
	    <tr>
		  	  <?php
				if($this->session->userdata('user_details'))
				{
              ?>
			 <td width="127" align="left" valign="middle"><?php echo ucfirst($this->user_details->emp_fname).' '.$this->user_details->emp_lname?></td>
			 <?php
                }
                else
                {
				?>
				<td width="4" align="left" valign="middle">&nbsp;</td>
              <?php
			  	}
                if($this->session->userdata('user_details'))
                {
              ?>
			  <td width="120" height="25" align="right" valign="middle"><a href="<?php echo base_url();?>booking/changepwd" class="white_bold_txt_12px jlo">Change Password</a></td>
              <td width="49" height="25" align="right" valign="middle"><a href="<?php echo base_url();?>login/logout" class="white_bold_txt_12px jlo">LogOut</a></td>
              <?php
                }
                else
                {
              ?>
	      <td width="35" height="25" align="right" valign="middle"><a href="<?php echo base_url();?>login" class="white_bold_txt_12px jli">Login</a></td>
              <?php
                }
              ?>
           <td width="13" align="left" valign="middle">&nbsp;</td>
        </tr>
	    <tr>
	      <td height="1" colspan="2" ></td>
        </tr>
      </table></td>
  </tr>
</table>

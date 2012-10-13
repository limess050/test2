

<table width="100%" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2" align="center" class="footer_text"><img src="<?php echo base_url();  ?>public/images/logo.png" /></td>
	</tr>
	<tr>
	  <td align="center" bgcolor="#BFA06B" class="footer_text"><table width="60%" border="0" align="left" cellpadding="5" cellspacing="0">
	    <tr>
	      <td width="15%"><table width="68" border="0" align="left" cellpadding="0" cellspacing="0">
	        <tr>
	          <td width="7" align="left" valign="middle">&nbsp;</td>
	          <td width="76" height="25" align="left" valign="middle" ><a href="<?php echo base_url();?>home" class="white_heading_txt_16px">Home </a></td>
	          </tr>
	        <tr>
	          <td height="1" colspan="2" ></td>
	          </tr>
          </table></td>
	      
	      <td width="17%"><table width="78" border="0" align="left" cellpadding="0" cellspacing="0">
	        <tr>
	          <td width="4" align="left" valign="middle">&nbsp;</td>
	          <td width="74" height="25" align="left" valign="middle"  ><a href="<?php echo base_url();?>booking" class="white_heading_txt_16px">Blocks</a></td>
	          </tr>
	        <tr>
	          <td height="1" colspan="2" ></td>
	          </tr>
          </table></td>
		  <td width="17%"><table width="75" border="0" align="left" cellpadding="0" cellspacing="0">
	        <tr>
	          <td width="4" align="left" valign="middle">&nbsp;</td>
	          <td width="71" height="25" align="left" valign="middle" ><a href="<?php echo base_url();?>booking/checkOut" class="white_heading_txt_16px">Rooms</a></td>
	          </tr>
	        <tr>
	          <td height="1" colspan="2" ></td>
	          </tr>
          </table></td>	
	      <td width="15%">
		  <table width="66" border="0" align="left" cellpadding="0" cellspacing="0">
	        <tr>
	          <td width="5" align="left" valign="middle">&nbsp;</td>
	          <td width="61" height="25" align="left" valign="middle"  ><a href="<?php echo base_url();?>booking/getDayReport" class="white_heading_txt_16px">Donors</a></td>
	          </tr>
	        <tr>
	          <td height="1" colspan="2" ></td>
	          </tr>
          </table></td>
			<td width="36%">
		  <table width="147" border="0" align="left" cellpadding="0" cellspacing="0">
	        <tr>
	          <td width="5" align="left" valign="middle">&nbsp;</td>
	          <td width="142" height="25" align="left" valign="middle"  ><a href="<?php echo base_url();?>booking/getDayReport" class="white_heading_txt_16px">Operators</a></td>
	          </tr>
	        <tr>
	          <td height="1" colspan="2" ></td>
	          </tr>
          </table></td>
        </tr>
      </table></td>
	  <td align="center" bgcolor="#BFA06B" class="footer_text">
      <table width="147" border="0" align="right" cellpadding="0" cellspacing="0">
	    <tr>
	      <td width="5" align="left" valign="middle">&nbsp;</td>
              <?php
                if ($this->session->userdata('user_details'))
                {
              ?>
              <td width="142" height="25" align="right" valign="middle"><a href="<?php echo base_url();?>login/logout" class="white_bold_txt_12px jlo">LogOut</a></td>
              <?php
                }
                else
                {
              ?>
	      <td width="142" height="25" align="right" valign="middle"><a href="<?php echo base_url();?>login" class="white_bold_txt_12px jli">Login</a></td>
              <?php
                }
              ?>
           <td width="10" align="left" valign="middle">&nbsp;</td>
        </tr>
	    <tr>
	      <td height="1" colspan="2" ></td>
        </tr>
      </table></td>
  </tr>
</table>

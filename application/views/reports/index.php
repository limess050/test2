<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Daily Report</title>
<style>
body{
font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
font-size:12px;
}
p, h1, form, button{border:0; margin:0; padding:0;}
.spacer{clear:both; height:1px;}
/* ----------- My Form ----------- */
.myform{
margin:0 auto;
width:1000px;
padding:14px;
}

/* ----------- stylized ----------- */
#stylized{
border:solid 2px #b7ddf2;
background:#ebf4fb;
}
#stylized h1 {
font-size:14px;
font-weight:bold;
margin-bottom:8px;
}
#stylized p{
font-size:11px;
color:#666666;
margin-bottom:20px;
border-bottom:solid 1px #b7ddf2;
padding-bottom:10px;
}
#stylized label{
display:block;
font-weight:bold;
text-align:right;
width:180px;
float:left;
padding-top:6px;
}
#stylized .small{
color:#666666;
display:block;
font-size:11px;
font-weight:normal;
text-align:right;
width:140px;
}
#stylized .iptxt input,select,textarea,file{
/*float:left;*/
font-size:12px;
padding:4px 2px;
border:solid 1px #aacfe4;
width:200px;
margin:2px 0 10px 10px;
}
#stylized .ipradio input{
/*float:left;*/
font-size:12px;
padding:4px 2px;
border:solid 1px #aacfe4;
margin:8px 0 10px 10px;
}
#stylized button{
clear:both;
margin-left:160px;
width:125px;
height:31px;
background:#666666 url(img/button.png) no-repeat;
text-align:center;
line-height:31px;
color:#FFFFFF;
font-size:11px;
font-weight:bold;
}
</style>
<script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/viewPrint.js" ></script>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td align="left" valign="top">&nbsp;</td>
	</tr>
	<tr>
		<td align="left" valign="top">
		<table width="85%" border="1" cellspacing="1" cellpadding="1" align="center" id="the_content" class="tabborder">
			<tr>
				<td align="center" valign="top" ><h1>Daily Stats  Report</h1></td>
			</tr>
			<tr>
				<td align="left" valign="top" ><h4>Booking Details</h4></td>
			</tr>
			<tr>
				<td align="center" valign="top" class="barheading">
					<table width="100%" border="0" align="center">
						<tr>
							<td width="11%" align="left" valign="top">Operator Name:</td>
							<td width="66%" align="left" valign="top"><strong><?php echo $user_name;?></strong></td>
							<td width="8%" align="left" valign="top">Date:</td>
							<td width="15%" align="left" valign="top"><?php echo $date;?></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td align="center" valign="top" class="barheading">
					<table width="100%" border="1" cellspacing="1" cellpadding="1" align="center">
						<?php
						if(!empty($booked_report_arr))
						{?>
								<tr>
									<td width="33%" align="left" valign="top"><strong>Room Name</strong></td>
									<td width="17%" align="left" valign="top"><strong>Advance Amount (Rs)</strong></td>
									<td width="20%" align="left" valign="top"><strong>Deposite Amount (Rs)</strong></td>
									<td width="15%" align="left" valign="top"><strong>Rent Amount (Rs)</strong></td>
									<td width="15%" align="left" valign="top"><strong>Total Amount (Rs)</strong></td>
								</tr>
						<?php	
							foreach($booked_report_arr as $blocks=>$rep_values)
							{?>
								<tr>
									<td align="left" colspan="5"><?php echo $blocks;?></td>
								</tr>
								<?php
								foreach($rep_values as $key=>$values)
								{
								?>
								<tr>
									<td width="33%" align="left" valign="top"><?php echo $values['room_name'];?></td>
									<td width="17%" align="right" valign="top"><?php echo $values['advance_amount'];?></td>
									<td width="20%" align="right" valign="top"><?php echo $values['deposit_amt'];?></td>
									<td width="15%" align="right" valign="top"><?php echo $values['rent_amount'];?></td>
									<td width="15%" align="right" valign="top"><?php echo $values['total_amount_paid'];?></td>
								</tr>
							<?php	
								}
							}
							?>
								<tr>
									<td align="right" valign="top" colspan="4"><strong>Total</strong></td>
									<td width="15%" align="right" valign="top"><?php echo number_format($con_total_amount,2);?></td>
								</tr>
						<?php	
						}
						else
						{ ?>
								<tr>
									<td align="center" colspan="5">No Bookings Done</td>
								</tr>
						<?php
						}
						?>
					</table>
				</td>
			</tr>
			<p></p>
			<tr>
				<td align="left" valign="top" ><h4>Refund Details</h4></td>
			</tr>
			<tr>
				<td align="center" valign="top" class="barheading">
					<table width="100%" border="1" cellspacing="1" cellpadding="1" align="center">
						<?php
						if(!empty($refund_report_arr))
						{?>
								<tr>
									<td width="33%" align="left" valign="top"><strong>Room Name</strong></td>
									<td width="17%" align="left" valign="top"><strong>Refund Amount (Rs)</strong></td>
								</tr>
						<?php	
							foreach($refund_report_arr as $blocks=>$rep_values)
							{?>
								<tr>
									<td align="left" colspan="2"><?php echo $blocks;?></td>
								</tr>
								<?php
								foreach($rep_values as $key=>$values)
								{
								?>
								<tr>
									<td width="33%" align="left" valign="top"><?php echo $values['room_name'];?></td>
									<td width="17%" align="right" valign="top"><?php echo $values['deposit_refund_amount'];?></td>
								</tr>
							<?php	
								}
							}
							?>
								<tr>
									<td align="right" valign="top"><strong>Total</strong></td>
									<td width="15%" align="right" valign="top"><?php echo number_format($con_ref_total_amount,2);//echo $con_ref_total_amount;?></td>
								</tr>
						<?php	
						}
						else
						{ ?>
								<tr>
									<td align="center" colspan="5">No Refunds Done</td>
								</tr>
						<?php
						}
						?>
					</table>
				</td>
			</tr>
			<tr>
				<td align="left" valign="top" ><h4>Total Details</h4></td>
			</tr>
			<tr>
				<td align="center" valign="top" class="barheading">
					<table width="31%" border="1" cellspacing="1" cellpadding="1" align="center">
						<tr>
							<td align="left" valign="top" ><strong>Type</strong></td>
							<td align="left" valign="top" ><strong>Total Amount(Rs)</strong></td>
						</tr>
						<tr>
							<td align="left" valign="top" >Booking</td>
							<td align="right" valign="top" ><?php echo number_format($con_total_amount,2);//echo $con_total_amount;?></td>
						</tr>
						<tr>
							<td align="left" valign="top" >Refund</td>
							<td align="right" valign="top" ><?php echo number_format($con_ref_total_amount,2); //echo $con_ref_total_amount;?></td>
						</tr>
						<tr>
							<td align="left" valign="top" ><strong>Total</strong></td>
							<td align="right" valign="top" >
							<?php $diff_amt = $con_total_amount-$con_ref_total_amount; echo number_format($diff_amt,2);?>							</td>
						</tr>
				  </table>
				</td>
			</tr>
			<tr>
				<td align="right" valign="top" class="barheading">
					<table width="31%" align="right">
						<tr>
							<td align="center" valign="top">&nbsp;</td>
						</tr>
						<tr>
							<td align="center" valign="top">&nbsp;</td>
						</tr>
						<tr>
							<td align="center" valign="top">&nbsp;</td>
						</tr>
						<tr>
							<td align="center" valign="top">&nbsp;</td>
						</tr>
						<tr>
							<td align="center" valign="top">Authorized Signature</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td align="center" valign="top">&nbsp;</td>
	</tr>
	<tr>
		<td align="center" valign="top">
		<input type="button" name="Print" value="Print" class="button" onClick="javascript:Clean4Print('the_content')"/>&nbsp;
		</td>
	</tr>
	<tr>
		<td align="left" valign="top">&nbsp;</td>
	</tr>
</table>

</body>
</html>

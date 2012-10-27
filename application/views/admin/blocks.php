<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Room Booking</title>
        <style>
            body{
                font-family:"Lucida Grande", "Lucida Sans Unicode", Verdana, Arial, Helvetica, sans-serif;
                font-size:12px;
                background-color: #E8E8E8;
            }
            p, h1, form, button{border:0; margin:0; padding:0;}
            .spacer{clear:both; height:1px;}
            /* ----------- My Form ----------- */
            .myform{
                margin:0 auto;
                width:970px;
                padding:14px;
            }

            /* ----------- stylized ----------- */
            #stylized{
                border:solid 2px #F7F2EA;
                background:#E2D5BC;
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
            #myfileUploader {
                margin-left: 10px;
            }

            #stylized .iptxt .error {
                font-size: 12px;
                padding: 4px 2px;
                border: solid 1px red;
                width: 200px;
                margin: 2px 0 10px 10px;
            }

            .ui-state-disabled .ui-state-default {
                background:red;
            }

            .odd { background-color: red; }
            /*#stylized input.error {
                border: 2px solid red;
                background-color: #FFFFD5;
                margin: 0px;
                color: red;
            }*/

        </style>
		
        
		<link href="<?php echo base_url();  ?>public/css/general/redmond/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();  ?>public/css/general/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();  ?>public/css/general/style2.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();  ?>public/css/style.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="<?php echo base_url();?>public/css/layout.css" type="text/css" media="screen" />
        <script src="<?php echo base_url();?>public/js/jquery-1.5.2.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>public/js/jqGrid-4.3.1/js/i18n/grid.locale-en.js" type="text/javascript" language="javascript"></script>
		<script src="<?php echo base_url();?>public/js/jqGrid-4.3.1/src/grid.base.js" type="text/javascript" language="javascript"></script>
		<link rel="stylesheet" href="<?php echo base_url();?>public/js/jquery-ui-1.8.21/css/smoothness/jquery-ui-1.8.21.custom.css" />
		<link href="<?php echo base_url();?>public/js/jqGrid-4.3.1/src/css/ui.jqgrid.css" rel="stylesheet"  />
		<script src="<?php echo base_url();?>public/js/hideshow.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.equalHeight.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>public/js/jquery.blockUI.js"></script>
		<script src="<?php echo base_url();?>public/js/validate.js" type="text/javascript"></script>
        <script type="text/javascript" rel="javascript">
            var base_url="<?php echo base_url();  ?>";
            // window.onerror=function(){ return true; }
        </script>

        <script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/general/jquery-ui-custom.min.js" ></script>

        <script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/general/common.js" ></script>
        <script type="text/javascript" language="javascript">
            function DisableBackButton() {
                window.history.forward()
            }
            DisableBackButton();
            window.onload = DisableBackButton;
            window.onpageshow = function(evt) { if (evt.persisted) DisableBackButton() }
            window.onunload = function() { void (0) }
        </script>
		 <script>
	var site_url = '<?php echo site_url();?>'
		$(document).ready(function(){
			$.ajaxSetup({
				 jsonp: null,
				 jsonpCallback: null
			  });
			jQuery("#sub_grid_tbl").jqGrid431({
			
				url:'<?php echo site_url();?>admin/getblocks',
				datatype: "json",
				mtype:'POST',
				//height: $('#sidebar').height()-24,
				//width: $('.form_prp').width()-10,
				height: 500,
				width: 900,
				colNames:['Name','Status','Edit'],
				colModel:[
					{name:'name',index:'name',widht:500},
					{name:'status',index:'status'},
					{name:'edit',index:'edit'}
				],
				rowNum:10,
				//rowList:[10,20,30],
				pager: '#sub_grid_pager',
				sortname: 'id',
				viewrecords: true,
				sortorder: "desc",
				multiselect: false,
				childGrid: true,
				childGridIndex: "rows"
				
			});
			$('.jedit_la').live('click',function(){
				var $this= $(this);
				var id = $(this).attr('id');
				qry_str = 'id='+id;
				$.ajax({
					type: "POST",	
					data: qry_str,
					url: site_url+"adminlibaccount/account_view", 
					beforeSend : function(){
					},
					success: function(data)
					{
							$('#addliberty').html(data);
							$('.j_ae_ecur_txt').text('Edit Liberty Account');
								$.blockUI({ 
									message: $('#addliberty'), 
									css: { 
										marginTop:  -($('.m_w').height())/2,
										left:'50%',
										top:'50%',
										width:'450px',
										marginLeft:'-225px',
										height: 'auto'
									} 
								}); 
					},
					complete : function()
					{
					}
				});
			});
			/*$('.jadd_la').live('click',function(){
				var $this= $(this);
				var id = $(this).attr('id');
				qry_str = 'id='+id;
				$.ajax({
					type: "POST",	
					data: qry_str,
					url: site_url+"adminlibaccount/account_view", 
					beforeSend : function(){
					},
					success: function(data)
					{
							$('#addliberty').html(data);
							$('.j_ae_ecur_txt').text('Add Liberty Account');
								$.blockUI({ 
									message: $('#addliberty'), 
									css: { 
											marginTop:  -($('.m_w').height())/2,
											left:'50%',
											top:'50%',
											width:'450px',
											marginLeft:'-225px',
											height: 'auto'
										} 
								}); 
					},
					complete : function()
					{
					}
				});
			});*/
			$('.j_u_m').live('click',function(){
				$.unblockUI();
			});
			
		});
	</script>
    </head>

    <body>
        <table width="1003" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">

            <tr>
                <td colspan="2" align="center" valign="bottom"></td>
            </tr>
            <tr>
                <td height="20" colspan="2" align="left" valign="bottom" ><?php $this->load->view('common/adminheader');//include("header.php"); ?></td>
            </tr>
            <tr height="600px">
                <td align="center" valign="top" width="900">
					
								<div id="stylized" class="myform">
								<table align="center" cellpadding="0" cellspacing="0">
									<tr><td align="right">
										 <a class="btn edit_ecur fr" href="<?php echo site_url();?>adminlibaccount/account_view">
											<span class="inner-btn">
												<span class="label"><img class="small_plus_icon" height="16" width="16" src="images/spacer.gif">
													Add Block
												</span>
											</span>
										</a>
									</td></tr>
									<tr>
										<td>
											<table id="sub_grid_tbl" class="cs_gd" height="100%"></table>
											<div id="sub_grid_pager"></div>
										</td>
									</tr>
								</table>    
								</div>
							
				</td>
            </tr>
<?php $this->load->view('common/footer'); //include("footer.php"); ?>
        </table>
    </body>
</html>

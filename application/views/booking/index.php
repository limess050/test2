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
        <link href="<?php echo base_url(); ?>uploadify/uploadify.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();  ?>public/css/general/redmond/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();  ?>public/css/general/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();  ?>public/css/general/style2.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url();  ?>public/css/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/library.js" ></script>
        <script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/js/validate.js" ></script>
        <script type="text/javascript" src="<?php echo base_url();?>uploadify/swfobject.js"></script>
        <script type="text/javascript" src="<?php echo base_url();?>uploadify/jquery.uploadify.v2.1.4.js"></script>
        <script>
            $(document).ready(function(){

                $("#bookingform").validate({
                    highlight: function(element, errorClass, validClass) {
                         $(element).addClass(errorClass).removeClass(validClass);
                         $(element.form).find("label[for=" + element.id + "]").addClass(errorClass);
                      },
                      unhighlight: function(element, errorClass, validClass) {
                         $(element).removeClass(errorClass).addClass(validClass);
                         $(element.form).find("label[for=" + element.id + "]").removeClass(errorClass);
                      },
                      errorPlacement: function(error, element) { }
                });

                advanced_booking = false;
                $('.jvip_quota').click(function(){
                    if($(this).val() == '1')
                    {
                        $('.jrefname').slideDown('slow');
                    }
                    else
                    {
                        $('.jrefname').slideUp('slow');
                    }
                    blocks_rooms();
                });
                //$('.mydp').datepicker({dateFormat:'dd-mm-yy', changeMonth: true, changeYear: true});
                $('.jbooktype').click(function(){
                    adv_date = '<?php echo $tomorrow;?>';
                    if($(this).val() == '2')
                    {
                        advanced_booking = true;
                        $('#blocks_id').val('');
                        $('#rooms_id').val('').attr('disabled','disabled');
                        $('.dpcontainer').html('<span style="float:right" class="mydp"></span>');
                        $('.jfromhtml').html('<label>Check-In Date:</label><input type="text" name="from_date" class="jfrom" id="from" />');
                        $('.jtohtml').html('<label>Check-Out Date:</label><input type="text" name="to_date" class="jto" id="to" />');
                        if($('.jfrom').length>0){
                            $('.jfrom').datepicker({beforeShow: customRange2_Year,dateFormat:'dd-mm-yy', changeMonth: true, changeYear: true});
                        }

                        if($('.jto').length>0){
                            $('.jto').datepicker({beforeShow: customRange_Year,dateFormat:'dd-mm-yy', changeMonth: true, changeYear: true});
                        }
                        /*$('.jfrom').val('');
                    $('.jto').val('');*/
                        $('.jadvamt').slideDown('slow');
                    }
                    else
                    {
                        $('.jfrom').val('<?php echo $today;?>');
                        $('.jto').val('<?php echo $tomorrow;?>');
                        $('.jadvamt').slideUp('slow');
                        blocks_rooms();
                    }
                });

                $('#from').change(function(){
                    blocks_rooms();
                });

                $('#to').change(function(){
                    blocks_rooms();
                });

                $('#blocks_id').change(function(){
                    $('.dpcontainer').html('');
                    if($(this).val() == '')
                    {
                        $('#rooms_id').val('').attr('disabled','disabled');
                    }
                    else
                    {
                        blocks_rooms();
                    }
                });

                natDays = [];
                //natDays   = [[1,1,2012],[1,1,2013],[12,31,2012],[10,22,2012]];
                $('#rooms_id').change(function(){
                    $('.dpcontainer').html('<span style="float:right" class="mydp"></span>');
                    qry_str = 'blocks_id='+$('#blocks_id').val()+'&rooms_id='+$(this).val();
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url();?>booking/getRoomBookingDates',
                        data: qry_str,
                        dataType: 'json',
                        beforeSend : function(){
                        },
                        success: function(resdata){
                            natDays = resdata;
                            //natDays   = [[10,31,2012],[10,22,2012]];
                        },
                        complete: function(){
                            var d = new Date();
                            $(".mydp").datepicker({
                                minDate: new Date(d.getFullYear(), 1 - 1, 1),
                                maxDate: new Date(d.getFullYear()+1, 11, 31),
                                hideIfNoPrevNext: true,
                                beforeShowDay: noWeekendsOrHolidays
                            });
                        }
                    });
                });

                //$('#rooms_id').html('<option>asdf</option>');

            });

            function nationalDays(date) {
                var m = date.getMonth();
                var d = date.getDate();
                var y = date.getFullYear();
                for (var i = 0; i < natDays.length-1; i++) {
                    var datets = Date.parse(natDays[i]);
                    var myDate = new Date(datets);
                    if ((m == (myDate.getMonth())) && (d == (myDate.getDate())) && (y == (myDate.getFullYear())))
                    {
                        return [false];
                    }
                }
                return [true];
            }

            /*function nationalDays(date) {
            var m = date.getMonth();
            var d = date.getDate();
            var y = date.getFullYear();

            for (i = 0; i < natDays.length; i++) {
                if ((m == natDays[i][0] - 1) && (d == natDays[i][1]) && (y == natDays[i][2]))
                {
                    return [false];
                }
            }
            return [true];
        }*/
            function noWeekendsOrHolidays(date) {
                return nationalDays(date);
                /*var noWeekend = $.datepicker.noWeekends(date);
            if (noWeekend[0]) {
                return nationalDays(date);
            } else {
                return [true];
            }*/
            }

            function blocks_rooms()
            {
                var vip_quota = $('.jvip_quota:checked').val();
                var qry_str = '';
                var blocks_id = $('#blocks_id').val();
                if(vip_quota == "1")
                {
                    qry_str += 'vip_quota=1&';
                }
                var from_date = $('#from').val();
                if(from_date != '')
                {
                    qry_str += 'from_date='+from_date+'&';
                }
                var to_date = $('#to').val();
                if(to_date != '')
                {
                    qry_str += 'to_date='+to_date+'&';
                }
                qry_str += 'blocks_id='+blocks_id;
                //if((from_date != '') && (to_date != ''))
                if(blocks_id != '')
                {
                    $.ajax({
                        type: "POST",
                        url: '<?php echo base_url();?>booking/getAvaliableBlocksRooms',
                        data: qry_str,
                        beforeSend : function(){
                        },
                        success: function(data){
                            if(data['block_options'] === false)
                            {
                                $('#rooms_id').html(data['room_options']);
                            }
                            else
                            {
                                $('#blocks_id').html(data['block_options']);
                                $('#rooms_id').html(data['room_options']);
                            }
                        },
                        complete: function(){
                            $('#rooms_id').removeAttr('disabled');
                        }
                    });
                }
            }

        </script>
        <script type="text/javascript" rel="javascript">
            var base_url="<?php echo base_url();  ?>";
            var main_url="<?php echo base_url();  ?>";
            // window.onerror=function(){ return true; }
        </script>

<!--<script type="text/javascript" language="javascript" src="<?php echo base_url();  ?>public/public/js/general/jquery-ui-1.7.3.custom.min.js" ></script>-->
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
    </head>

    <body>
        <script language=JavaScript>
            /*var message="Right Click not allowed";
            function clickIE4()
            {
                if (event.button==2)
                {
                    alert(message);
                    return false;
                }
            }
            function clickNS4(e)
            {
                if (document.layers||document.getElementById&&!document.all)
                {
                    if (e.which==2||e.which==3)
                    {
                        alert(message);
                        return false;
                    }
                }
            }
            if (document.layers)
            {
                document.captureEvents(Event.MOUSEDOWN);
                document.onmousedown=clickNS4;
            }
            else if (document.all&&!document.getElementById)
            {
                document.onmousedown=clickIE4;
            }
            document.oncontextmenu=new Function("alert(message);return false")*/
        </script>


        <table width="1003" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">

            <tr>
                <td colspan="2" align="center" valign="bottom"></td>
            </tr>
            <tr>
                <td height="20" colspan="2" align="left" valign="bottom" ><?php $this->load->view('common/header');//include("header.php"); ?></td>
            </tr>
            <tr>
                <td align="center" valign="top"><table width="98%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td align="left" valign="top" class="pannel_border"><div id="stylized" class="myform">
                                    <form id="bookingform" name="bookingform" method="post" action="<?php echo base_url();?>booking/roomBooking">
                                        <h1>Room Booking Details</h1>
                                        <p></p>
                                        <div class="iptxt">
                                            <label>Application ID:</label>
                                            <input type="text" name="application_id" id="application_id" class="required"/>
                                        </div>
                                        <div class="iptxt">
                                            <label>Customer ID: </label>
                                            <input type="text" name="customer_id" id="customer_id" class="required"/>
                                        </div>
                                        <div class="ipradio">
                                            <label>VIP Reference: </label>
                                            <input class="jvip_quota" type="radio" name="vip_quota" value="1" />
                                            Yes
                                            <input type="radio" class="jvip_quota" checked="checked" name="vip_quota" value="0" />
                                            No
                                        </div>
                                        <div class="iptxt jrefname" style="display:none">
                                            <label>VIP Reference Name: </label>
                                            <input type="text" name="vip_ref_by" id="vip_ref_by" />
                                        </div>
                                        <div class="ipradio">
                                            <label>Booking Type: </label>
                                            <input type="radio" name="booking_type" class="jbooktype" value="1" />
                                            Current
                                            <input type="radio" name="booking_type" class="jbooktype" value="2" />
                                            Advanced
                                        </div>
                                        <div class="iptxt jfromhtml">
                                            <label>Check-In Date:</label>
                                            <input type="text" name="from_date" class="jfrom required" id="from" />
                                        </div>
                                        <div class="iptxt jtohtml">
                                            <label>Check-Out Date:</label>
                                            <input type="text" name="to_date" class="jto required" id="to" />
                                        </div>
                                        <div class="iptxt">
                                            <label>Block: </label>
                                            <select name="blocks_id" id="blocks_id" class="required">
                                                <option value="">Select Block</option>
                                                <?php
                                                foreach($master_data['blocks'] as $block) {
                                                    echo '<option value="'.$block->id.'">'.$block->name.'</option>';
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="iptxt">
                                            <label>Room: </label>
                                            <select name="rooms_id" id="rooms_id" disabled class="required">
                                                <option value="">Select Room</option>
                                                <?php
                                                /*foreach($master_data['rooms'] as $room)
                                                {
                                                    echo '<option value="'.$room->id.'">'.$room->name.'</option>';
                                                }*/
                                                ?>
                                            </select>
                                            <span class="dpcontainer"><span style="float:right" class="mydp"></span></span>
                                        </div>
                                        <div class="iptxt jadvamt" style="display:none">
                                            <label>Advance Amount:</label>
                                            <input type="text" name="advance_amount" id="advance_amount" class="required" />
                                        </div>
                                        <div class="iptxt">
                                            <label>Amount:</label>
                                            <input type="text" name="rent_amount" id="rent_amount" class="required" />
                                        </div>
                                        <div class="iptxt">
                                            <label>Deposit:</label>
                                            <input type="text" name="deposit_amt" id="deposit_amt" class="required" />
                                        </div>

                                        <div class="iptxt">
                                            <label>Name: </label>
                                            <input type="text" name="applicant_name" id="applicant_name" class="required" />
                                        </div>
                                        <div class="iptxt">
                                            <label>Address: </label>
                                            <textarea name="applicant_address" id="applicant_address" class="required"></textarea>
                                        </div>
                                        <!--<div class="iptxt">
                                            <label>Photo: </label>
                                            <input type="file" name="image_path" id="image_path" />
                                        </div>-->
                                        <div class="iptxt">
                                            <label for="myfile">Photo: </label>
                                            <input name="files" id="myfile" class="myfile" value="" type="hidden"/>
                                            <input name="MAX_FILE_SIZE" value="10000" type="hidden" />
                                        </div>
                                        <?php echo formtoken::getField(); ?>
                                        <p></p>
                                        <button type="submit">Submit</button>
                                        <div class="spacer"></div>
                                    </form>
                                </div></td>
                        </tr>
                    </table></td>
            </tr>
<?php $this->load->view('common/footer'); //include("footer.php"); ?>
        </table>
        <script type="text/javascript">
            var base_url = '<?php echo base_url();?>';
            var site_url='<?php echo site_url()?>';
            var app_name = '<?php echo $this->config->item('app_name') ?>';
            $(function(){

                $('.myfile').uploadify({
                    'uploader'  : site_url+'uploadify/uploadify.swf',
                    'script'    : '<?php echo base_url();  ?>uploadify/uploadify.php',
                    //'script'    : '<?php //echo base_url('uploadify');  ?>',
                    'cancelImg' : site_url+'uploadify/cancel.png',
                    'folder'    : '/'+app_name+'/uploads',
                    'auto'      : true,
                    'multi'     : false,
                    'fileExt'   : '*.jpg;*.gif;*.png',
                    'fileDesc'    : 'Image Files',
                    'sizeLimit'   : 1024000,
                    'removeCompleted' : false,
                    'onComplete'  : function(event, ID, fileObj, response, data) {
                        // Any Callback Functionality goes here.
                    }
                });

            });
        </script>
    </body>
</html>

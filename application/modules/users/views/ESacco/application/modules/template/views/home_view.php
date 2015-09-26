<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <title>AdiSacco</title>
    <!-- start: META -->
    <meta charset="utf-8" />
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- end: META -->
    <!-- start: MAIN CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/fonts/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/main-responsive.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/iCheck/skins/all.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/theme_light.css" type="text/css" id="skin_color">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/css/print.css" type="text/css" media="print"/>
    <!--[if IE 7]>
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/font-awesome-ie7.min.css">
    <![endif]-->
    <!-- end: MAIN CSS -->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
  </head>
  <style type="text/css">
  .alert{
        padding-left: 15px;
        padding-right: 15px;
        padding-top: 8px;
        padding-bottom: 8px;
        margin-top: 0px;
  }
  </style>
  <!-- end: HEAD -->
  <!-- start: BODY -->
  <body class="login example2">
         <?php
        if (!isset($view_file)) {
            $view_file = $this->uri->segment(2);
        }


        if (!isset($module)) {
            $module = $this->uri->segment(1);
        }


        if (($module != "") && ($view_file != "")) {
            $path = $module . "/" . $view_file;
            $this->load->view($path);
        }

        //  $this->load->view($module."/".$view_file);
        ?> 
        <hr/>
    <!-- start: MAIN JAVASCRIPTS -->
    <!--[if lt IE 9]>
    <script src="assets/plugins/respond.min.js"></script>
    <script src="assets/plugins/excanvas.min.js"></script>
    <script type="text/javascript" src="assets/plugins/jQuery-lib/1.10.2/jquery.min.js"></script>
    <![endif]-->
    <!--[if gte IE 9]><!-->
    <script src="<?php echo base_url();?>assets/admin/plugins/jQuery-lib/2.0.3/jquery.min.js"></script>
    <!--<![endif]-->
    <script src="<?php echo base_url();?>assets/admin/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/blockUI/jquery.blockUI.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/iCheck/jquery.icheck.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/less/less-1.5.0.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/jquery-cookie/jquery.cookie.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/main.js"></script>
    <!-- end: MAIN JAVASCRIPTS -->
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<!-- <script src="<?php echo base_url();?>assets/admin/plugins/jquery-validation/dist/jquery.validate.min.js"></script>-->
    <script src="<?php echo base_url();?>assets/admin/js/login.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script>
      jQuery(document).ready(function() {
        Main.init();
        Login.init();
        //Added function for the email use alert.
          $('#email_alert').hide();
          $('#email_registration').focusout(function(){
              em = $(this).val();
              $.get('<?php echo base_url();?>users/check_existing_email/'+em, function (data) {
                  obj = jQuery.parseJSON(data);
                  if (jQuery.isEmptyObject(obj)) {
                      $('#email_alert').hide();
                      $('#registration_button').removeAttr('disabled');
                  } else{
                      $('#email_alert').show();
                      $('#registration_button').attr('disabled', 'true');
                  }
              });
          }); 
      });
    </script>
  </body>
  


</html>
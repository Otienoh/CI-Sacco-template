<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.4 Author: ClipTheme -->
<!--[if IE 8]><html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
  <!--<![endif]-->
  <!-- start: HEAD -->
  
<!-- Mirrored from www.cliptheme.com/preview/admin/clip-one/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Sep 2015 15:55:49 GMT -->
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
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/font-awesome/css/font-awesome-ie7.min.css">
    <![endif]-->
    <!-- end: MAIN CSS -->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/admin/plugins/fullcalendar/fullcalendar/fullcalendar.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link rel="shortcut icon" href="favicon.ico" />
  </head>
  <!-- end: HEAD -->
  <!-- start: BODY -->
  <body>
    <!-- start: HEADER -->
    <div class="navbar navbar-inverse navbar-fixed-top">
      <!-- start: TOP NAVIGATION CONTAINER -->
      <div class="container">
        <div class="navbar-header">
          <!-- start: RESPONSIVE MENU TOGGLER -->
          <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
            <span class="clip-list-2"></span>
          </button>
          <!-- end: RESPONSIVE MENU TOGGLER -->
          <!-- start: LOGO -->
          <a class="navbar-brand" href="#">
            ADI <i class="clip-network"></i> Sacco
          </a>
          <!-- end: LOGO -->
        </div>
        <div class="navbar-tools">
          <!-- start: TOP NAVIGATION MENU -->
          <ul class="nav navbar-right">
            <!-- start: USER DROPDOWN -->
            <li class="dropdown current-user">
              <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                <img src="<?php echo base_url();?>assets/admin/images/avatar-1-small.jpg" class="circle-img" alt="">
                <span class="username">Username</span>
                <i class="clip-chevron-down"></i>
              </a>
              <ul class="dropdown-menu">
                <li>
                  <a href="#">
                    <i class="clip-user-2"></i>
                    &nbsp;My Profile
                  </a>
                </li>
                <li class="divider"></li>
                <li>
                  <a href="<?php echo base_url();?>users/logout">
                    <i class="clip-exit"></i>
                    &nbsp;Log Out
                  </a>
                </li>
              </ul>
            </li>
            <!-- end: USER DROPDOWN -->
          </ul>
          <!-- end: TOP NAVIGATION MENU -->
        </div>
      </div>
      <!-- end: TOP NAVIGATION CONTAINER -->
    </div>
    <!-- end: HEADER -->
    <!-- start: MAIN CONTAINER -->
    <div class="main-container">
      <div class="navbar-content">
        <!-- start: SIDEBAR -->
        <div class="main-navigation navbar-collapse collapse">
          <!-- start: MAIN MENU TOGGLER BUTTON -->
          <div class="navigation-toggler">
            <i class="fa fa-outdent"></i>
          </div>
          <!-- end: MAIN MENU TOGGLER BUTTON -->
          <!-- start: MAIN NAVIGATION MENU -->
          <ul class="main-navigation-menu">
            <li class="active open">
              <a href="index.html"><i class="clip-home-3"></i>
                <span class="title"> DASHBOARD </span><span class="selected"></span>
              </a>
            </li>
            <li>
              <a href="<?php echo base_url();?>users/profile"><i class="clip-users"></i>
                <span class="title">Profile</span>
                <span class="selected"></span>
              </a>
            </li>
            <li>
              <a href="javascript:void(0)"><i class="clip-users"></i>
                <span class="title"> MEMBERS </span><i class="icon-arrow"></i>
                <span class="selected"></span>
              </a>
              <ul class="sub-menu">
                <li><a href="<?php echo base_url();?>users/profile"><span class="title"> Profile </span></a></li>
                <li><a href="#"><span class="title"> Membership Requests </span></a></li>
                <li><a href="#"><span class="title"> View Members </span></a></li>
              </ul>
            </li>
            <li>
              <a href="javascript:void(0)"><i class="clip-archive"></i>
                <span class="title"> LOANS </span><i class="icon-arrow"></i>
                <span class="selected"></span>
              </a>
              <ul class="sub-menu">
                <li><a href="#"><span class="title"> Loan Requests </span></a></li>
                <li><a href="#"><span class="title"> Loan Tracker </span></a></li>
                <li><a href="#"><span class="title"> Loan Types </span></a></li>
                <li><a href="#"><span class="title"> View Loans </span></a></li>
                <li><a href="#"><span class="title"> Loan Journals </span></a></li>
                <li><a href="#"><span class="title"> Loan Defaulters/Risk </span></a></li>
              </ul>
            </li>
            <li>
              <a href="javascript:void(0)"><i class="clip-stack-2"></i>
                <span class="title"> SAVINGS </span><i class="icon-arrow"></i>
                <span class="selected"></span>
              </a>
              <ul class="sub-menu">
                
                  <li>
                    <a href="#">
                      <span class="title">View Savings</span>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <span class="title"> Savings Journal</span>
                    </a>
                  </li>
              
                
              </ul>
            </li>
            <li>
              <a href="javascript:void(0)"><i class="clip-user-5"></i>
                <span class="title"> GUARANTORS </span><i class="icon-arrow"></i>
                <span class="selected"></span>
              </a>
              <ul class="sub-menu">
                <li>
                  <a href="#">
                    <span class="title">My Guarantors</span>
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <a href="#"><i class="clip-data"></i>
                <span class="title">ACCOUNTING</span>
                <span class="selected"></span>
              </a>
            </li>
            <li>
              <a href="#"><i class="clip-file"></i>
                <span class="title">REPORTS</span>
                <span class="selected"></span>
              </a>
            </li>
            <li>
              <a href="#"><i class="clip-notification"></i>
                <span class="title">INFO</span>
                <span class="selected"></span>
              </a>
            </li>
            <li>
              <a href="#">
                
                <span class="selected"></span>
              </a>
            </li>
          </ul>
          <!-- end: MAIN NAVIGATION MENU -->
        </div>
        <!-- end: SIDEBAR -->
      </div>
      <!-- start: PAGE -->
       <div class="main-content">
        
        <div class="container">
          <!-- start: PAGE HEADER -->
          <div class="row">
            <div class="col-sm-12">
              <!-- start: PAGE TITLE & BREADCRUMB -->
              <ol class="breadcrumb">
                <li>
                  <i class="clip-home-3"></i>
                  <a href="#">
                    <?php echo $section?>
                  </a>
                </li>
                <li class="active">
                  <?php echo $subtitle ?>
                </li>
              
              </ol>
              <div class="page-header">
                <h1><?php echo $page_title ?> <small><?php echo $subpage_title ?> </small></h1>
              </div>
              <!-- end: PAGE TITLE & BREADCRUMB -->
            </div>
          </div>
          <!-- end: PAGE HEADER -->
          <!-- start: PAGE CONTENT -->
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
    <!-- end: PAGE CONTENT-->
        </div>
      </div>
      <!-- end: PAGE -->
    </div>
    <!-- end: MAIN CONTAINER -->
    <!-- start: FOOTER -->
    <div class="footer clearfix">
      <div class="footer-inner">
        2015 &copy; Sacco System.
      </div>
      <div class="footer-items">
        <span class="go-top"><i class="clip-chevron-up"></i></span>
      </div>
    </div>
    <!-- end: FOOTER -->
    <div id="event-management" class="modal fade" tabindex="-1" data-width="760" style="display: none;">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
              &times;
            </button>
            <h4 class="modal-title">Event Management</h4>
          </div>
          <div class="modal-body"></div>
          <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-light-grey">
              Close
            </button>
            <button type="button" class="btn btn-danger remove-event no-display">
              <i class='fa fa-trash-o'></i> Delete Event
            </button>
            <button type='submit' class='btn btn-success save-event'>
              <i class='fa fa-check'></i> Save
            </button>
          </div>
        </div>
      </div>
    </div>
    <!-- start: MAIN JAVASCRIPTS -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url();?>assets/admin/plugins/respond.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/excanvas.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>assets/admin/plugins/jQuery-lib/1.10.2/jquery.min.js"></script>
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
    <script src="<?php echo base_url();?>assets/admin/plugins/flot/jquery.flot.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/flot/jquery.flot.pie.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/flot/jquery.flot.resize.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/jquery.sparkline/jquery.sparkline.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
    <script src="<?php echo base_url();?>assets/admin/plugins/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <script src="<?php echo base_url();?>assets/admin/js/index.js"></script>
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <script>
      jQuery(document).ready(function() {
        Main.init();
        Index.init();
      });
    </script>
  </body>
  <!-- end: BODY -->

</html>
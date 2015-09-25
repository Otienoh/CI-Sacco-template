<?php
class Dashboard extends MX_Controller 
{

function __construct() {
parent::__construct();
//Modules::run('secure_tings/is_logged_in');
}

function home() {
	//echo "welcome to Dashboard";
	$data['section'] = "ADI Sacco";
    $data['subtitle'] = "Members";
  	$data['page_title'] = "Dashboard";
  	$data['subpage_title'] = "overview & stats";
	$data['module'] = "dashboard";
	$data['view_file'] = "home";
	echo Modules::run('template/member', $data);

}



}
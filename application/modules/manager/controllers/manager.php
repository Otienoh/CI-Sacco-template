<?php
/**
* 
*/
class Manager extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->login_reroute(2);
	}

	public function index()
	{
		//echo "welcome to Dashboard";
	$data['section'] = "ADI Sacco";
    $data['subtitle'] = "Manager";
  	$data['page_title'] = "Dashboard";
  	$data['subpage_title'] = "overview & stats";
	$data['module'] = "dashboard";
	$data['view_file'] = "home";
	echo Modules::run('template/manager', $data);
	}
}
?>
<?php
/**
* 
*/
class Member extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->login_reroute(3);
		$this->load->model('m_member');
	}

	public function index()
	{
		$data['section'] = "ADI Sacco";
	    $data['subtitle'] = "Members";
	  	$data['page_title'] = "Dashboard";
	  	$data['subpage_title'] = "overview & stats";
		$data['module'] = "dashboard";
		$data['view_file'] = "home";
		echo Modules::run('template/member', $data);	
	}

	function get_active_memeber($id)
	{
		return $this->m_member->get_where($id);
	}
}
?>
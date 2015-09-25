<?php
/**
* 
*/
class Template extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Template');
		
	}

	function admin($data=NULL)
	{
		$this->load->view('admin_view', $data);
	}

	function manager($data=NULL)
	{
		$this->load->view('manager_view', $data);
	}

	function member($data=NULL)
	{
		$this->load->view('member_view', $data);
	}

	function redirect($type)
	{
		return $this->M_Template->get_redirect($type);
	}

}
?>
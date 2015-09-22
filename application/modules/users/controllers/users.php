<?php
/**
* 
*/
class Users extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Users');
	}

	public function index()
	{

	}

	function authenticate()
	{
		$email = $this->input->post('');

	}
}
?>
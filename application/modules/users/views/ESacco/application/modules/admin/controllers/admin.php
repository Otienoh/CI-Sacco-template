<?php
/**
* 
*/
class Admin extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->login_reroute(1);
	}

	public function index()
	{
		$this->template->admin();
	}
}
?>
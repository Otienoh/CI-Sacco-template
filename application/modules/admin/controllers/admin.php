<?php
/**
* 
*/
class Admin extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->login_reroute();
	}

	public function index()
	{
		
	}
}
?>
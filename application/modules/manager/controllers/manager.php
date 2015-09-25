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
		
	}
}
?>
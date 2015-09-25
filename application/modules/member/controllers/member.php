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
	}

	public function index()
	{
		$this->template->member();		
	}
}
?>
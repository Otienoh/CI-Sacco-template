<?php
/**
* 
*/
class reports extends MY_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->_logged_in();
		$this->load->model('m_reports');
	}

	function loan_monthly_amounts($year=NULL)
	{
		return $this->m_reports->loan_monthly_amounts($year);
	}
}
?>
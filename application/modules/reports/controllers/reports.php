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

	function loan_monthly_amounts($year=NULL,$user_id=NULL)
	{
		return $this->m_reports->loan_monthly_amounts($year,$user_id);
	}

	function savings_monthly_amounts($year=NULL,$user_id=NULL)
	{
		return $this->m_reports->savings_monthly_amounts($year,$user_id);
	}

	function loan_type_popularity()
	{
		return $this->m_reports->popular_loan_types();
	}
}
?>
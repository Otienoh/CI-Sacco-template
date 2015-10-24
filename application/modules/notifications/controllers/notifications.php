<?php
/**
* 
*/
class Notifications extends MY_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		$this->_logged_in();
		$this->load->model('m_notifications');
	}

	function send_notification($array=null)
	{

		$applicant_details = $this->m_notifications->get_user_member_data($this->session->userdata('user_id'))->result_array();
		$data[0] = array(
					'loan_id' => $array['loan'],
					'applicant_id' => $applicant_details[0]['member_id'], 
					'guarantor_id' => $array['guarantor1'], 
					'message' => $applicant_details[0]['middle_name'].' '.$applicant_details[0]['first_name'].' with Member ID: '.$applicant_details[0]['member_id'].' has requested you to be one of the guarantors for a loan amounting to, '.$array['amount']
					);
		$data[1] = array(
					'loan_id' => $array['loan'],
					'applicant_id' => $applicant_details[0]['member_id'], 
					'guarantor_id' => $array['guarantor2'], 
					'message' => $applicant_details[0]['middle_name'].' '.$applicant_details[0]['first_name'].' with Member ID: '.$applicant_details[0]['member_id'].' has requested you to be one of the guarantors for a loan amounting to, '.$array['amount']
					);
		
		// echo "<pre>";print_r($data);die();
		return $this->m_notifications->_insert_batch($data);
	}
}
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
		$this->load->module('loans');
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

	function loan_preview($loan_id){
		$this->load->model('m_member');
		$data['loan_details'] = $this->loans->_custom_query($this->m_member->get_loan_details($loan_id))->result_array();
		if ($data['loan_details'][0]['is_paid']==0) {
			$id = $data['loan_details'][0]['loan_id'];
            $amount = $data['loan_details'][0]['loan_payable'];
			$data['button'] = "<a href='#responsive' data-toggle='modal' onclick=\"repay($id,$amount)\"><button class='btn btn-success'>Repay Loan</button></a>";
		}
		// echo "<pre>";print_r($data);die();
		$data['guarantor_affirmation'] = $this->guarantor_affirmation($loan_id);
		$data['section'] = "ADI Sacco";
	    $data['subtitle'] = "Member";
	  	$data['page_title'] = "Loans";
	  	$data['subpage_title'] = "Preview Loan";
		$data['module'] = "member";
		$data['view_file'] = "loan_preview";
		
		echo Modules::run('template/member', $data);
	}

	function guarantor_affirmation($loan_id)
	{
		$this->load->module('savings');
		$guarantors_data = $this->loans->_custom_query($this->m_member->get_guarantor_affirmation($loan_id))->result_array();
		$count=0;
		foreach ($guarantors_data as $key => $value) {
			// echo "<pre>";print_r($this->savings->get_user_savings($value['user_id']));die();
			$data[$count] = array(
								'first_name'=> $value['first_name'],
								'middle_name'=> $value['middle_name'],
								'last_name'=> $value['last_name'],
								'mobile_number'=> $value['mobile_number'],
								'status' => $this->status_3level($value['status']),
								'current_savings'=> $this->savings->get_user_savings($value['user_id'])
								);
			$count++;
		}
		return $data;
	}

	function repay_loan($loan_id)
	{
		$repay = $this->loans->repay_loan($loan_id);
		if ($repay) {
			redirect('loans/view_loans/'.$this->session->userdata('user_id'));
		}
	}
}
?>
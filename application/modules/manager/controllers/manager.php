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
		$this->load->module('loans');
		$this->load->model('m_manager');
	}

	public function index()
	{
		//echo "welcome to Dashboard";
	$data['section'] = "ADI Sacco";
    $data['subtitle'] = "Manager";
  	$data['page_title'] = "Dashboard";
  	$data['subpage_title'] = "overview & stats";
	$data['module'] = "dashboard";
	$data['view_file'] = "home";
	echo Modules::run('template/manager', $data);
	}

	function loans()
	{
		$data['section'] = "ADI Sacco";
	    $data['subtitle'] = "Manager";
	  	$data['page_title'] = "Loans";
	  	$data['subpage_title'] = "overview & stats";
		$data['module'] = "manager";
		$data['view_file'] = "list_loans";
	
		$data['loans'] = $this->dataTable_loans('date_of_application');
		// echo "<pre>";print_r($data['loans']);die();
		echo Modules::run('template/manager', $data);
	}
	function dataTable_loans($orderby)
	{
		$loans_data = '';
		$loans = $this->loans->get($orderby)->result_array();
		// echo "<pre>";print_r($loans);die();
		$count = 1;
		if ($loans) {
			foreach ($loans as $key => $value) {
				$loan_notifications = $this->get_loan_data($value['loan_id']);

				$loans_data .= '<tr>
									<td>'.$count.'</td>
									<td>'.$value['user_id'].'</td>
									<td>'.$value['loan_amount'].'</td>
									<td>'.$value['loan_purpose'].'</td>
									<td>'.$loan_notifications['guarantor1'].'</td>
									<td>'.$loan_notifications['guarantor2'].'</td>
									<td>'.$value['status'].'</td>
									<td>'.$value['is_paid'].'</td>
									<td><a href="'.base_url().'manager/loan_preview/'.$value['loan_id'].'"><button class="btn btn-primary">Preview Loan</button></a></td>
								</tr>';
				$count++;
			}
		} else {
			$loans_data = '<tr>
								<td colspan="8">No Loan Data Found Yet</td>
							</tr>';
		}
		return $loans_data;
	}

	function loan_preview($loan_id){
		$this->load->model('m_manager');
		$data['loan_details'] = $this->loans->_custom_query($this->m_manager->get_loan_details($loan_id))->result_array();
		$data['guarantor_affirmation'] = $this->guarantor_affirmation($loan_id);
		$data['section'] = "ADI Sacco";
	    $data['subtitle'] = "Manager";
	  	$data['page_title'] = "Loans";
	  	$data['subpage_title'] = "overview & stats";
		$data['module'] = "manager";
		$data['view_file'] = "loan_preview";
		
		echo Modules::run('template/manager', $data);
	}

	function guarantor_affirmation($loan_id)
	{
		$this->load->module('savings');
		$guarantors_data = $this->loans->_custom_query($this->m_manager->get_guarantor_affirmation($loan_id))->result_array();
		$count=0;
		foreach ($guarantors_data as $key => $value) {
			// echo "<pre>";print_r($this->savings->get_user_savings($value['user_id']));die();
			$data[$count] = array(
								'first_name'=> $value['first_name'],
								'middle_name'=> $value['middle_name'],
								'last_name'=> $value['last_name'],
								'mobile_number'=> $value['mobile_number'],
								'status' => $this->loan_status($value['status']),
								'current_savings'=> $this->savings->get_user_savings($value['user_id'])
								);
			$count++;
		}
		return $data;
	}

	function loan_status($status)
	{
		if ($status) {
			# code...
		} else if ($status) {
			# code...
		}
		else if ($status) {
			# code...
		}
		
	}

	function loan_clearance($loan_id, $status)
	{
		$clearance = $this->loans->_custom_query($this->m_manager->prepare_loan_clearance_stmt($loan_id,$status));
		redirect(base_url().'manager/loans');
	}

}
?>
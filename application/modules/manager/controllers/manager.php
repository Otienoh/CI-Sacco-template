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
				$loans_data .= '<tr>
									<td>'.$count.'</td>
									<td>'.$value['user_id'].'</td>
									<td>'.$value['loan_amount'].'</td>
									<td>'.$value['loan_purpose'].'</td>
									<td>'.$value['guarantor1'].'</td>
									<td>'.$value['guarantor2'].'</td>
									<td>'.$value['is_paid'].'</td>
									<td>'.$value['status'].'</td>
									<td><a href="'.base_url().'loans/loan_preview/'.$value['loan_id'].'"><button class="btn btn-primary">Preview Loan</button></a></td>
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
		$name = $data['loan_details'][0]['middle_name']." ".$data['loan_details'][0]['first_name'];
		// echo "<pre>";print_r($data['loan_details']);die();
		$data['section'] = "ADI Sacco";
	    $data['subtitle'] = "Manager";
	  	$data['page_title'] = "Loans Preview";
	  	$data['subpage_title'] = $name;
		$data['module'] = "manager";
		$data['view_file'] = "loan_preview";
	
		echo Modules::run('template/manager', $data);
	}
}
?>
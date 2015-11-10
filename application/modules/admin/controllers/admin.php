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
		$this->load->model('m_admin');
	}

	public function index()
	{
		//echo "welcome to Dashboard";
		$data['section'] = "ADI Sacco";
	    $data['subtitle'] = "Administrator";
	  	$data['page_title'] = "Dashboard";
	  	$data['subpage_title'] = "overview";
		$data['module'] = "dashboard";
		$data['view_file'] = "home";
		echo Modules::run('template/admin', $data);
	}

	function managers()
	{
		$data['section'] = "ADI Sacco";
	    $data['subtitle'] = "Administrator";
		$data['page_title'] = "Managers";
	  	$data['subpage_title'] = "Add Manager";
		$data['module'] = "admin";
		$data['view_file'] = "add_manager";
		echo Modules::run('template/admin', $data);
	}

	function managers_listing()
	{
		$data['managers'] = $this->list_managers();
		$data['section'] = "ADI Sacco";
	    $data['subtitle'] = "Administrator";
		$data['page_title'] = "Managers";
	  	$data['subpage_title'] = "Add Manager";
		$data['module'] = "admin";
		$data['view_file'] = "list_managers";
		echo Modules::run('template/admin', $data);
	}

	function manager_registration()
	{
		$this->load->module('users');
		if($this->users->check_existing_email($this->input->post('email'))){
			$this->session->set_flashdata('available','The email Provided already exists try another one!');
			redirect('admin/managers');
		}
		$register_logs = $this->m_admin->register_manager_logs($this->hash->password($this->config->item('default_password')));
		$register_manager = $this->m_admin->register_manager($register_logs);
		redirect('admin/managers_listing');

	}

	function list_managers()
	{
		$manager_details = '';
		$count = 1;
		$managers = $this->m_admin->get_managers();
		if ($managers) {
			foreach ($managers as $key => $value) {
			$manager_details .= '<tr>
									<td>'.$count.'</td>
									<td>'.$value['first_name'].'</td>
									<td>'.$value['middle_name'].'</td>
									<td>'.$value['last_name'].'</td>
									<td>'.$value['email'].'</td>
									<td>'.$value['ID_No'].'</td>
									<td>'.$value['gender'].'</td>
									<td>'.$value['title'].'</td>
									<td></td>
								</tr>';
			$count++;
		}
		} else {
			$manager_details = '<tr><td colspan="10"><center><p>You have not saved any money yet!</p></center></td></tr>';
		}
		
		

		return $manager_details;
	}

	function reports()
	{
		$this->load->module('reports');
		$data['chart'] = $this->reports->loan_monthly_amounts(date('Y'));
		$data['pie'] = $this->reports->loan_type_popularity();
		$data['height'] = 450;
		$data['year'] = date('Y');
		$data['section'] = "ADI Sacco";
	    $data['subtitle'] = "Administrator";
	  	$data['page_title'] = "Reports";
	  	$data['subpage_title'] = "Statistics and Analytics";
		$data['module'] = "admin";
		$data['view_file'] = "reports";
		echo Modules::run('template/admin', $data);
	}

	function loans()
	{
		$this->load->module('loans');
		$data['loan_types'] = $this->loans->get_loan_types();
		$data['section'] = "ADI Sacco";
	    $data['subtitle'] = "Administrator";
	  	$data['page_title'] = "Loans";
	  	$data['subpage_title'] = "Loan Configurations";
		$data['module'] = "admin";
		$data['view_file'] = "loans_view";
		echo Modules::run('template/admin', $data);
	}

	function add_loan_type()
	{
		$insert = $this->m_admin->add_loan_type();
		redirect('admin/loans');
	}

	function edit_loan_type()
	{
		$edit = $this->m_admin->edit_loan_type();
		redirect('admin/loans');
	}
}
?>
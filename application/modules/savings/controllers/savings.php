<?php if (!defined('BASEPATH')) exit('No direct script access allowed!');
/**
* 
*/
class savings extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->_logged_in();
		$this->load->model('m_savings');
	}

	function _custom_query($mysql_query) {
		$query = $this->m_savings->_custom_query($mysql_query);
		return $query;
	}

	function mysavings()
	{
		$data['savings_data'] = $this->get_mysavings();
		$data['section'] = "ADI Sacco";
	    $data['subtitle'] = "Members";
	  	$data['page_title'] = "Savings";
	  	$data['subpage_title'] = "overview & stats";
		$data['module'] = "savings";
		$data['view_file'] = "mysavings";
		echo Modules::run('template/member', $data);
	}

	function get_mysavings()
	{
		$savings_data = array('tabular'=>'');
		$count = 1;
		$mysavings = $this->m_savings->get_savings($this->session->userdata('user_id'));
		if ($mysavings) {
			foreach ($mysavings as $key => $value) {
				$savings_data['tabular'] .= '<tr>
									<td>'.$count.'</td>
									<td>'.$value['client'].'</td>
									<td>'.$value['deposit'].'</td>
									<td>'.$value['withdrawal'].'</td>
									<td>'.$value['transaction_date'].'</td>
								</tr>';
				$count++;
			}
			$savings_data['savings'] = $this->get_user_savings($this->session->userdata('user_id'));
			// echo "<pre>";print_r($savings_data);die();
		} else {
			$savings_data['tabular'] = '<tr><td colspan="5"><center><p>You have not saved any money yet!</p></center></td></tr>';
		}
		
		
		return $savings_data;
	}

	function deposit()
	{
		$data['section'] = "ADI Sacco";
	    $data['subtitle'] = "Members";
	  	$data['page_title'] = "Deposit";
	  	$data['subpage_title'] = "overview & stats";
		$data['module'] = "savings";
		$data['view_file'] = "deposit";
		$data['saving_methods'] = $this->get_parent_sources();
		echo Modules::run('template/member', $data);
	}

	function withdraw()
	{
		$data['section'] = "ADI Sacco";
	    $data['subtitle'] = "Members";
	  	$data['page_title'] = "Withdrawal";
	  	$data['subpage_title'] = "overview & stats";
		$data['module'] = "savings";
		$data['view_file'] = "withdraw";
		$data['withdrawal_methods'] = $this->get_parent_sources();
		$data['savings_data'] = $this->get_user_savings($this->session->userdata('user_id'));
		echo Modules::run('template/member', $data);
	}

	function add()
	{
		$mydepo = $this->m_savings->add_savings($this->session->userdata('user_id'));
		redirect('savings/mysavings');
	}

	function withdraw_amount(){
		if ($this->input->post('amount')>$this->get_user_savings($this->session->userdata('user_id'))) {
			$this->session->set_flashdata('error', 'Insufficient Funds to complete the request');
			redirect('savings/withdraw');
		} else {
			$mywithdraw = $this->m_savings->withdrawal($this->session->userdata('user_id'));
			redirect('savings/mysavings');
		}
		
	}

	function get_user_savings($id=NULL)
	{
		$user_savings = $this->m_savings->get_total_savings($id);
		return $user_savings[0]['total_current_savings'];
	}

	function get_parent_sources()
	{
		$parent_sources = $this->m_savings->get_savings_sources(0)->result_array();
		$options = '';
		foreach ($parent_sources as $key => $value) {
			$options .= '<option value="'.$value['source'].'">'.$value['source'].'</option>';
		}
		return $options;
	}
}
?>
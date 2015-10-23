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
		$savings_data = '';
		$count = 1;
		$mysavings = $this->m_savings->get_savings($this->session->userdata('user_id'));
		if ($mysavings) {
			foreach ($mysavings as $key => $value) {
				$savings_data .= '<tr>
									<td>'.$count.'</td>
									<td>'.$value['client'].'</td>
									<td>'.$value['deposit'].'</td>
									<td>'.$value['withdrawal'].'</td>
									<td>'.$value['transaction_date'].'</td>
								</tr>';
				$count++;
			}
		} else {
			$savings_data = '<tr><td colspan="5"><center><p>You have not saved any money yet!</p></center></td></tr>';
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
		echo Modules::run('template/member', $data);
	}

	function add()
	{
		$mydepo = $this->m_savings->add_savings($this->session->userdata('user_id'));
		redirect('savings/mysavings');
	}

	function get_user_savings($id=NULL)
	{
		$user_savings = $this->m_savings->get_total_savings($id);
		return $user_savings[0]['total_current_savings'];
	}
}
?>
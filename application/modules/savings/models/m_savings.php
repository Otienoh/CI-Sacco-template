<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class m_savings extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function _custom_query($mysql_query) {
		$query = $this->db->query($mysql_query);
		return $query;
	}

	function get_savings($user_id)
	{
		$query = $this->db->get_where('savings', ['user_id' => $user_id]);

		return $query->result_array();
	}

	function add_savings($user_id)
	{
		$client = $this->input->post('client');
		if ($this->input->post('code_identifier_moblie')) {
			$code = $this->input->post('code_identifier_moblie');
		} else {
			$code = $this->input->post('code_identifier_bank');
		}
		$amount = $this->input->post('amount');
		
		$data = array(
					'user_id' => $user_id,
					'client' => $client,
					'deposit' => $this->input->post('amount'),
					'description' => 'Code: '.$code.' for a deposit transaction made through: '.$client);
		$insert = $this->db->insert('savings', $data);


		if ($this->input->post('standing_order')) {
			$stand_order = array(
								'user_id' => $user_id,
								'account_number' => $code,
								'amount' => $amount
								);
			$insert = $this->db->insert('standing_order', $stand_order);
		}
		return $insert;
	}

	function withdrawal($user_id)
	{
		$client = $this->input->post('client');
		if ($this->input->post('code_identifier_moblie')) {
			$code = $this->input->post('code_identifier_moblie');
		} else {
			$code = $this->input->post('code_identifier_bank');
		}
		
		$data = array(
					'user_id' => $user_id,
					'client' => $client,
					'withdrawal' => $this->input->post('amount'),
					'description' => 'Account: '.$code.' request for a withdrawal transaction made through: '.$client);
		$insert = $this->db->insert('savings', $data);
	}

	function get_total_savings($id)
	{
		$sql = "SELECT
					SUM(`deposit`)-SUM(`withdrawal`) AS `total_current_savings`
				FROM
					`savings`
				WHERE `user_id` = '$id'";
		return $this->db->query($sql)->result_array();
	}

	function get_savings_sources($parent_id)
	{
		$this->db->where('parent_id',$parent_id);
		return $this->db->get('savings_methods');
	}
}
?>
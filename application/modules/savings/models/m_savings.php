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
		$data = array(
					'user_id' => $user_id,
					'client' => $this->input->post('client'),
					'deposit' => $this->input->post('amount'));
		$insert = $this->db->insert('savings', $data);
	}

	function get_savings_details($user_id)
	{
		$sql = "SELECT
					SUM(`deposit`)-SUM(`withdrawal`) AS `savings`
				FROM `savings`
				WHERE `user_id` = '$user_id'";
		return $sql;
	}
}
?>
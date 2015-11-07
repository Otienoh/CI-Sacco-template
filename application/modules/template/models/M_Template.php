<?php 
if(!defined('BASEPATH')) exit('No direct script access allowed');
/**
* 
*/
class m_template extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function get_redirect($type)
	{
		$sql = "SELECT `user_table` FROM `user_types` WHERE `user_type_id` = '$type'";
		$result = $this->db->query($sql);
		$result = $result->result_array();

		return $result[0]['user_table'];
	}
}
?>
<?php
/**
* 
*/
class M_Users extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function get_active_user($email)
	{
		$query = $this->db->get_where(
			'users',
			[
				'email' => $email,
				'status' => 1
			]
		);

		$result = $query->row();

		return $result;
	}

	function check_email($email)
	{
		$query = $this->db->get_where(
			'users',
			[
				'email' => $email
			]
		);

		$result = $query->row();

		return $result;
	}

	function register_logs($email,$identifier,$password)
	{
		$data = array(
					'email' => $email,
					'password' => $password,
					'user_type_id' => 3,
					'activation_key' => $identifier
					);
		$insert = $this->db->insert('users', $data);
		if ($insert) {
			return mysql_insert_id();
		} else {
			return $insert;
		}
		
		
	}

	function identifier_builder($email)
	{
		$sql = "SELECT 
					`usr`.`email`,
					`ustyp`.`user_type`
				FROM `users` `usr`
				LEFT JOIN `user_types` `ustyp`
				ON `usr`.`user_type_id` = `ustyp`.`user_type_id`
				WHERE `usr`.`email` = 'admin@sacco.com'";
		$result = $this->db->query($sql);
		$result = $result->result_array();

		$scope = date('MD');
		$encrypt_key = $this -> encrypt -> get_key();
		$input = $email.$result[0]['user_type'].$scope.$encrypt_key.$result[0]['email'];
		$identifier = strtoupper(hash('sha256', $input));

		return $identifier;
	}


	
}
?>
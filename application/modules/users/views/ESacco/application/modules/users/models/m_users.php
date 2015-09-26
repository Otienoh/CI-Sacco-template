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

	function register_member_details($user_id)
	{
		$data = array(
					'first_name' => $this->input->post('first_name'),
					'middle_name' => $this->input->post('middle_name'),
					'last_name' => $this->input->post('last_name'),
					'gender' => $this->input->post('gender'),
					'ID_No' => $this->input->post('ID_number'),
					'town' => $this->input->post('town'),
					'user_id' => $user_id
					);
		$insert = $this->db->insert('members', $data);
	}

	function get_inactive_id($identifier)
	{
		$query = $this->db->get_where('users', ['activation_key' => $identifier]);
		if ($query->row()) {
			$result = $query->row();
			$id = $result->user_id;
		} else {
			$id = NULL;
		}
		
		return $id;
	}

	function activate_user($activate_id)
	{
		$sql = "UPDATE `users`
				SET
					`activation_key` = NULL,
					`status` = 1
				WHERE `user_id` = '$activate_id'";
				
		$result = $this->db->query($sql);
		return $result;
	}

	function identifier_builder($email)
	{
		$sql = "SELECT 
					`usr`.`email`,
					`ustyp`.`user_type`
				FROM `users` `usr`
				LEFT JOIN `user_types` `ustyp`
				ON `usr`.`user_type_id` = `ustyp`.`user_type_id`
				WHERE `usr`.`email` = '$email'";
		$result = $this->db->query($sql);
		$result = $result->result_array();
		$result = $result[0];
		// echo "<pre>";print_r($result);die();
		$scope = date('MD');
		$encrypt_key = $this -> encrypt -> get_key();
		$input = $email.$result['user_type'].$scope.$encrypt_key.$result['email'];
		$identifier = strtoupper(hash('sha256', $input));

		return $identifier;
	}


	
}
?>
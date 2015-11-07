<?php if(!defined('BASEPATH')) exit('No direct script access allowed!');
/**
* 
*/
class m_admin extends MY_Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	function get_managers()
	{
		$sql = "SELECT *
				FROM `managers` `mg` JOIN `users` `us`
				ON `mg`.`user_id` = `us`.`user_id`";
		$result = $this->db->query($sql);

		return $result->result_array();
	}

	function register_manager_logs($hashed_pass)
	{
		$email = $this->input->post('email');
		$data = array(
					'email' => $email,
					'password' => $hashed_pass,
					'user_type_id' => 2,
					'activation_key' => NULL,
					'status' => 1);
		$insert = $this->db->insert('users', $data);

		return $this->get_user_id($email);
	}

	function register_manager($user_id)
	{
		$data = array(
					'first_name' => $this->input->post('first_name'),
					'middle_name' => $this->input->post('middle_name'),
					'last_name' => $this->input->post('last_name'),
					'ID_No' => $this->input->post('ID_No'),
					'gender' => $this->input->post('gender'),
					'mobile_number' =>$this->input->post('phone'),
					'title' => $this->input->post('title'),
					'user_id' => $user_id);

		$insert = $this->db->insert('managers', $data);
	}

	function add_loan_type()
	{
		$data = array(
					'name' => $this->input->post('name'),
					'description' => $this->input->post('description'),
					'rates' => $this->input->post('rate'),
					'added_by' => $this->session->userdata('user_id')
					);
		return $this->db->insert('loan_types', $data);
	}

	function edit_loan_type()
	{
		$data = array(
                'name' => $this->input->post('edit_name'),
                'description' => $this->input->post('edit_description'),
                'rates' => $this->input->post('edit_rate'),
             );

	 $this->db->where('loan_type_id', $this->input->post('edit_id'));
	 $this->db->update('loan_types', $data); 
	}
}
?>
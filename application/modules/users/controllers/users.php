<?php
/**
* 
*/
class Users extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('M_Users');
		$this->load->module('hash');
	}

	public function login($par=NULL)
	{
		//$this->load->view('login_v');
		$data['module'] = "users";
		$data['view_file'] = "login_v";
		echo Modules::run('template/home', $data);

	}

	function registration()
	{
		$email = $this->input->post('email');
		$identifier = $this->M_Users->identifier_builder($email);
		$log_registration = $this->M_Users->register_logs($email,$identifier,$this->hash->password($this->input->post('password')));
		if ($log_registration) {
			$data['first_name'] = $this->input->post('first_name');
			$data['last_name'] = $this->input->post('last_name');
			$data['identifier'] = $identifier;
			$sent = $this->send_email($email,'New Memeber Registration', $this->email_template($data));
			$registration['message'] = 'Registration Complete. Activation email has been sent to the email: '.$email;
			$insert_member = $this->M_Users->register_member_details($log_registration);
		} else {
			$registration['message'] = 'Registration Incomplete. Unable to send email to: '.$email;
		}
		$this->load->view('registration_v',$registration);		
	}

	function authenticate()
	{
		$user = $this->M_Users->get_active_user($this->input->post('username'));
		// echo "<pre>";print_r($user);die();

		if($user && $this->hash->passwordCheck($this->input->post('password'), $user->password))
		{
			if($user->user_type_id == 1)
			{
				$this->session->set_userdata([
					'user_id' => $user->id,
					'user_type' => $user->user_type_id,
					'is_logged_in' => TRUE
				]);
				redirect(base_url() . 'admin');
			}
			else if($user->user_type_id == 2){
				$this->session->set_userdata([
					'user_id' => $user->id,
					'user_type' => $user->user_type_id,
					'is_logged_in' => TRUE
				]);
				redirect(base_url() . 'manager');
			}
			else if($user->user_type_id == 3){
				$this->session->set_userdata([
					'user_id' => $user->id,
					'user_type' => $user->user_type_id,
					'is_logged_in' => TRUE
				]);
				redirect(base_url() . 'member');
			}
		}
		else
		{
			$this->session->set_flashdata('error', 'Wrong Username or password');
			redirect(base_url() . 'users/login');
		}

	}

	function activate($identifier)
	{
		$activate_id = NULL;
		$activate_id = $this->M_Users->get_inactive_id($identifier);
		if ($activate_id) {
			$update = $this->M_Users->activate_user($activate_id);
			$this->session->set_flashdata('success', 'Registration Complete Login Below');
		} else {
			$this->session->set_flashdata('success', '<i class="fa fa-times-circle"></i>UnIdentified Activation Key provided');
		}
		redirect(base_url() . 'users/login');
	}

	function check_existing_email($email)
	{
		$email = $this->M_Users->check_email($email);

		echo json_encode($email);
	}

	function email_template($data)
	{
		$template = "<!DOCTYPE html>
		<html>
		<head>
		<link href='http://fonts.googleapis.com/css?family=Noto+Sans|Cabin|Open+Sans' rel='stylesheet' type='text/css'>
		<style type='text/css'>
			body
			{
				font-family: 'Noto Sans', sans-serif;
			}
		</style>
		</style>
		<body>
			<p>Hello ".$data['first_name'] . " " . $data['last_name'].", </p>
			<p>You have registered as to be a member of the Sacco Management System!</p>
			<p>Activate your account using this link: <a href='".base_url() . "users/activate/".urlencode($data['identifier'])."'>Click Here</a></p>
			
		</body>
		</html>";

		return $template;
	}
}
?>
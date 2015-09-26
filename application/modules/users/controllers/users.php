<?php
/**
* 
*/
class Users extends MY_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_users');
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
		$identifier = $this->m_users->identifier_builder($email);
		$log_registration = $this->m_users->register_logs($email,$identifier,$this->hash->password($this->input->post('password')));
		if ($log_registration) {
			$data['first_name'] = $this->input->post('first_name');
			$data['last_name'] = $this->input->post('last_name');
			$data['identifier'] = $identifier;
			$sent = $this->send_email($email,'New Memeber Registration', $this->email_template($data));
			$registration['message'] = 'Registration Complete. Activation email has been sent to the email: '.$email;
			$insert_member = $this->m_users->register_member_details($log_registration);
		} else {
			$registration['message'] = 'Registration Incomplete. Unable to send email to: '.$email;
		}
		$this->load->view('registration_v',$registration);		
	}

	function authenticate()
	{
		$user = $this->m_users->get_active_user($this->input->post('username'));
		// echo "<pre>";print_r($user);die();

		if($user && $this->hash->passwordCheck($this->input->post('password'), $user->password))
		{
			if($user->user_type_id == 1)
			{
				$this->session->set_userdata([
					'user_id' => $user->user_id,
					'user_type' => $user->user_type_id,
					'is_logged_in' => TRUE
				]);
				redirect(base_url() . 'admin');
			}
			else if($user->user_type_id == 2){
				$this->session->set_userdata([
					'user_id' => $user->user_id,
					'user_type' => $user->user_type_id,
					'is_logged_in' => TRUE
				]);
				redirect(base_url() . 'manager');
			}
			else if($user->user_type_id == 3){
				$this->session->set_userdata([
					'user_id' => $user->user_id,
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
		$activate_id = $this->m_users->get_inactive_id($identifier);
		if ($activate_id) {
			$update = $this->m_users->activate_user($activate_id);
			$this->session->set_flashdata('success', 'Registration Complete Login Below');
		} else {
			$this->session->set_flashdata('success', '<i class="fa fa-times-circle"></i>UnIdentified Activation Key provided');
		}
		redirect(base_url() . 'users/login');
	}

	function check_existing_email($email)
	{
		$email = $this->m_users->check_email($email);

		echo json_encode($email);
	}

	function profile()
	{
		$user_data = $this->m_users->user_data($this->session->userdata('user_id'));
		if ($user_data['user_table'] == 'members') {
			$module_details = $this->m_users->user_details($user_data['user_table'], $this->session->userdata('user_id'));
			// echo "<pre>";print_r($module_details);die();
			if ($module_details['complete'] == 1) {
				$data['user_details'] = array_merge($module_details,$user_data);
				$data['section'] = "ADI Sacco";
			    $data['subtitle'] = "Members";
			  	$data['page_title'] = "Complete Profile";
			  	$data['subpage_title'] = "overview & stats";
				$data['module'] = "users";
				$data['view_file'] = "complete_profile";
				echo Modules::run('template/member', $data);
			} else {
				$data['user_details'] = array_merge($module_details,$user_data);
				$data['section'] = "ADI Sacco";
			    $data['subtitle'] = "Members";
			  	$data['page_title'] = "Profile";
			  	$data['subpage_title'] = "overview & stats";
				$data['module'] = "users";
				$data['view_file'] = "member_profile";
				echo Modules::run('template/member', $data);
			}
		} else {
			$data['section'] = "ADI Sacco";
		    $data['subtitle'] = $user_data['user_table'];
		  	$data['page_title'] = "Profile";
		  	$data['subpage_title'] = "overview & stats";
			$data['module'] = "users";
			$data['view_file'] = "profile";
			echo Modules::run('template/member', $data);
		}
		
		
	}

	function complete_profile()
	{
		$complete = $this->m_users->complete_member($this->session->userdata('user_id'));

		redirect('users/profile');
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
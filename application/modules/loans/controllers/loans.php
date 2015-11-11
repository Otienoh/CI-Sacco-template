<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Loans extends MY_Controller 
{

	function __construct() {
		parent::__construct();
		
	}

	function create(){
		$this->load->model('m_loans');
		$block = $this->m_loans->check_previous_loans($this->session->userdata('user_id'));
		if ($block) {
			$this->session->set_flashdata('block','Sorry You can not place a new loan as you already have an existing pending loan.');
			redirect('loans/view_loans/'.$this->session->userdata('user_id'));
		}
		$data= $this->get_data_from_post();
		
		$data['maloantype']  = $this->m_loans->get_loan_type()->result_array();
		$data['section'] = "ADI Sacco";
		$data['subtitle'] = "Loan Module";
		$data['page_title'] = "Loan";
		$data['subpage_title'] = "Application";
		$data['module'] = "loans";
		$data['view_file'] = "loan_application_view";
		//echo "<pre>";print_r($data);die;
		echo Modules::run('template/member', $data);
	}

	function view_loans($user_id=NULL)
	{
		if($user_id){
			$loans = $this->get_where_custom('user_id', $user_id)->result_array();
		}else {
			$loans = $this->get('loan_id')->result_array();
		}

		$data['section'] = "ADI Sacco";
	    $data['subtitle'] = "Member";
	  	$data['page_title'] = "Loans";
	  	$data['subpage_title'] = "overview & stats";
		$data['module'] = "loans";
		$data['view_file'] = "list_loans";
	
		$data['loans'] = $this->dataTable_loans($loans);
		// echo "<pre>";print_r($data['loans']);die();
		echo Modules::run('template/member', $data);
		
	}

	function guarantee_requests()
	{
		$data['section'] = "ADI Sacco";
	    $data['subtitle'] = "Member";
	  	$data['page_title'] = "Loans";
	  	$data['subpage_title'] = "Guarantee Requests";
		$data['module'] = "loans";
		$data['view_file'] = "guarantee_request";
		$data['guarantee_request'] = $this->guarantee_data();
	
		echo Modules::run('template/member', $data);
	}

	function guarantee_data()
	{
		$briefed = '';
		$details = '';
		$count = 1;
		$this->load->model('m_loans');
		$notification_data = $this->m_loans->guarantee_requests($this->session->userdata('user_id'))->result_array();
		
		// echo "<pre>";print_r($notification_data);die();
		if ($notification_data) {
			foreach ($notification_data as $key => $value) {
				$briefed .= '<li class="messages-item"  id="br'.$count.'">
								<span title="Mark as starred" class="messages-item-star"><i class="fa fa-star"></i></span>
								<img alt="" src="'.base_url().'assets/admin/images/lightgrey.png" class="messages-item-avatar">
								<span class="messages-item-from">'.$value['first_name'].' '.$value['last_name'].'</span>
								<div class="messages-item-time">
									<span class="text">'.$value['time_of_application'].'</span>
								</div>
								<span class="messages-item-subject">Loan Guarantor Request</span>
							</li>';

				$details .= '<div class="messages-content" id="det-br'.$count.'">
					<div class="message-header">
						<div class="message-time">
							'.$value['day_of_application'].' '.$value['month_of_application'].' '.$value['year_of_application'].', '.$value['time_of_application'].'
						</div>
						<div class="message-from">
							'.$value['first_name'].' '.$value['last_name'].'
						</div>
						<div class="message-subject">
							Guarantor Request
						</div>
						<div class="message-actions">
							<a title="Move to trash" href="#"><i class="fa fa-trash-o"></i></a>
							<a title="Reply" href="#"><i class="fa fa-reply"></i></a>
							<a title="Reply to all" href="#"><i class="fa fa-reply-all"></i></a>
							<a title="Forward" href="#"><i class="fa fa-long-arrow-right"></i></a>
						</div>
					</div>
					<div class="message-content">
						<p>
							'.$value['message'].'
						</p>
						<div class="row">
						   <div class="col-md-4 col-md-offset-8">
						   		<div class="row">
							   		<div class="col-md-6">
							   			<a href="'.base_url().'loans/request_response/1/'.$value['loan_id'].'/'.$value['guarantor_id'].'"><button class="btn btn-success">Accept</button></a>
							   		</div>
							   		<div class="col-md-6">
							   			<a href="'.base_url().'loans/request_response/2/'.$value['loan_id'].'/'.$value['guarantor_id'].'"><button class="btn btn-danger">Decline</button></a>
							   		</div>
						   		</div>
						    </div>
						</div>
					</div>
				</div>';
				$count++;
			}
		} else {
			$briefed .= '<li class="messages-item"  id="br'.$count.'">
								You do not have any guarantee requests pending.
							</li>';
		}
		$requests = array(
						'brief' => $briefed,
						'detailed' => $details
						);
		// echo "<pre>";print_r($requests);die();
		return $requests;
		// echo "<pre>";print_r($notification_data);die();
	}

	function request_response($response,$loan_id,$guarantor_id)
	{
		$this->load->model('m_loans');
		$update = $this->m_loans->_custom_query($this->m_loans->guarantor_response($response,$loan_id,$guarantor_id));
		redirect(base_url().'loans/guarantee_requests');
	}

	function view_guarantors()
	{

	}

	function get_data_from_post(){
		$data['loan_amount']=$this->input->post('loan_amount', TRUE);     
		$data['loan_purpose']=$this->input->post('loan_purpose', TRUE);
		$data['loan_type']=$this->input->post('loan_type', TRUE);
		$data['months']=$this->input->post('months', TRUE); 
		$data['month_income']=$this->input->post('month_income', TRUE);
		$data['rates']=$this->input->post('rate', TRUE);

		return $data;

	}


	function submit (){
	  
	  $this->load->library('form_validation');
	  $this->form_validation->set_rules('loan_amount', 'Loan Amount', 'required|xss_clean');
	  $this->form_validation->set_rules('loan_purpose', 'Loan Purpose', 'required|xss_clean');
	  $this->form_validation->set_rules('loan_type', 'Loan Type', 'required|xss_clean');
	  $this->form_validation->set_rules('months', 'Months', 'required|xss_clean');
	  $this->form_validation->set_rules('month_income', 'Monthly Income ', 'required|xss_clean');
	  $this->form_validation->set_rules('guarantor1', 'Guarantor One', 'required|xss_clean');
	  $this->form_validation->set_rules('guarantor2', 'Guarantor Two', 'required|xss_clean');
	  //$update_id = $this->input->post('update_id', TRUE);
	  if ($this->form_validation->run() == FALSE)
	  {   
	    $this->create();         
	  }
	  else
	  {       
	   $data =  $this->get_data_from_post();
	    
	    $data['loan_payable']= ((($data['rates']*$data['months'])/100)*$data['loan_amount'])+$data['loan_amount'];
	    $data['loan_balance']= $data['loan_payable'];
		$data['instalments']=$data['loan_payable']/$data['months'];
		$data['status']= 0; 
		$data['user_id']=$this->session->userdata('user_id');
		$data['is_paid']=0;
		$data['is_risky']=0;
	   	
	   	$guarantor1 = $this->input->post('guarantor1', TRUE);
		$guarantor2 = $this->input->post('guarantor2', TRUE);
	   // if(is_numeric($update_id)){
	   //   $this->_update($update_id, $data);
	   //   $this->session->set_flashdata('msg', '<div id="alert-message" class="alert alert-success text-center">County details updated successfully!</div>');
	     
	   // } else {
	     $this->_insert($data);
	     $id = mysql_insert_id();
	     $notification = array(
	     					'loan' => $id,
	   						'guarantor1'=> $guarantor1,
							'guarantor2'=> $guarantor2,
							'amount'=> $this->input->post('loan_amount')
	   						);
	     $this->load->module('notifications');
	     $notify = $this->notifications->send_notification($notification);
	     $sent = $this->send_email($this->m_loans->get_member_email($guarantor1),'Loan Guarantee Request', $this->email_template($this->m_loans->get_user_member_data($this->session->userdata('user_id'))->result_array()));
	     $sent = $this->send_email($this->m_loans->get_member_email($guarantor2),'Loan Guarantee Request', $this->email_template($this->m_loans->get_user_member_data($this->session->userdata('user_id'))->result_array()));
	     // $email_notification['guarantors'][1] = $guarantor2;
	     // $email_notification['applicant'] = $this->m_loans->get_user_member_data($this->session->userdata('user_id'))->result_array();
	     // $sent = $this->send_email_notification($email_notification);
	     $this->session->set_flashdata('msg', '<div id="alert-message" class="alert alert-success text-center">Your loan request has been added successfully!</div>');
	   //}
	   
	                   //$this->session->set_flashdata('success', 'County added successfully.');
	   redirect('loans/view_loans/'.$this->session->userdata('user_id'));
	 }
	}

	function dataTable_loans($loans)
	{
		$this->load->model('m_loans');
		$loans_data = '';
		
		$count = 1;
		if ($loans) {
			foreach ($loans as $key => $value) {
				$loan_notifications = $this->get_loan_data($value['loan_id']);
				$guarantor1 = $this->m_loans->get_member_data($loan_notifications['guarantor1'])->result_array();
				$guarantor2 = $this->m_loans->get_member_data($loan_notifications['guarantor2'])->result_array();
				$applicant = $this->m_loans->get_user_member_data($value['user_id'])->result_array();
				// echo "<pre>";print_r($guarantor2[0]['last_name']);die();
				$loans_data .= '<tr>
									<td>'.$count.'</td>
									<td>'.$applicant[0]['last_name'].' '.$applicant[0]['first_name'].'</td>
									<td>'.$value['loan_amount'].'</td>
									<td>'.$value['loan_purpose'].'</td>
									<td>'.$guarantor1[0]['last_name'].' '.$guarantor1[0]['first_name'].'</td>
									<td>'.$guarantor2[0]['last_name'].' '.$guarantor2[0]['first_name'].'</td>
									<td>'.$this->status_3level($value['status']).'</td>
									<td>'.$this->status_3level($value['is_paid']).'</td>
									<td><a href="'.base_url().'member/loan_preview/'.$value['loan_id'].'"><button class="btn btn-primary">Preview Loan</button></a></td>
								</tr>';
				$count++;
			}
		} else {
			$loans_data = '<tr>
								<td colspan="8">No Loan Data Found Yet</td>
							</tr>';
		}
		return $loans_data;
	}

	/*
	*Confirm_guarantor_approval() checks if the guarantors have responded to the loan requested
	*If all the guarantors have responded it flags a pass
	*If one or both of the guarantors have not responded it flags a withhold. 
	*/
	function confirm_guarantor_approval($loan_id)
	{
		$this->load->model('m_loans');
		return $this->m_loans->confirm_guarantors_approval($loan_id);
	}

	function get_loan_types()
	{
		$table = "";
		$count=1;
		$this->load->model('m_loans');
		$loan_types = $this->m_loans->get_loan_type()->result_array();
		if($loan_types){
			foreach ($loan_types as $key => $value) {
				$id = $value['loan_type_id'];
				$name = $value['name'];
				$rate = $value['rates'];
				$description = $value['description'];

				$table .= "<tr>";
				$table .= "<td>".$count."</td>";
				$table .= "<td>".$value['name']."</td>";
				$table .= "<td>".$value['rates']."%</td>";
				$table .= "<td><a href='#responsive' data-toggle='modal' onclick=\"edit_loan_type($id,'$name','$rate','$description')\"><button class='btn btn-primary'>Edit</button></a></td>";
				$table .= "</tr>";
				$count++;
			}
		}else
		{
			$table = "<tr><td colspan='4'><center>No Loan Types Created yet!</center></td></tr>";
		}
		
		return $table;
	}

	function repay_loan($loan_id)
	{
		$this->load->model('m_loans');
		return $this->m_loans->loan_repayment($loan_id);
	}

	function confirm_guarantor($id){
		$this->load->module('member');
		$memeber = $this->member->get_active_memeber($id)->result_array();
		echo json_encode($memeber);
	}

	function loan_rate($id)
	{
		$this->load->model('m_loans');
		$rate = $this->m_loans->get_laon_rate($id);

		echo json_encode($rate);
	}

	function get($order_by){
		$this->load->model('m_loans');
		$query = $this->m_loans->get($order_by);
		return $query;
	}

	function get_with_limit($limit, $offset, $order_by) {
		$this->load->model('m_loans');
		$query = $this->m_loans->get_with_limit($limit, $offset, $order_by);
		return $query;
	}

	function get_where($id){
		$this->load->model('m_loans');
		$query = $this->m_loans->get_where($id);
		return $query;
	}

	function get_where_custom($col, $value) {
		$this->load->model('m_loans');
		$query = $this->m_loans->get_where_custom($col, $value);
		return $query;
	}

	function _insert($data){
		$this->load->model('m_loans');
		$this->m_loans->_insert($data);
	}

	function _update($id, $data){
		$this->load->model('m_loans');
		$this->m_loans->_update($id, $data);
	}

	function _delete($id){
		$this->load->model('m_loans');
		$this->m_loans->_delete($id);
	}

	function count_where($column, $value) {
		$this->load->model('m_loans');
		$count = $this->m_loans->count_where($column, $value);
		return $count;
	}

	function get_max() {
		$this->load->model('m_loans');
		$max_id = $this->m_loans->get_max();
		return $max_id;
	}

	function _custom_query($mysql_query) {
		$this->load->model('m_loans');
		$query = $this->m_loans->_custom_query($mysql_query);
		return $query;
	}

	function loan_preview($loan_id)
	{
		$this->load->model('m_loans');
		$this->load->module('savings');
		$data['loan_details'] = $this->_custom_query($this->m_loans->get_loan_details($loan_id))->result_array();
		$data['guarantor1'] = $this->_custom_query($this->m_loans->loan_guarantor($data['loan_details'][0]['guarantor1']))->result_array();
		$data['guarantor2'] = $this->_custom_query($this->m_loans->loan_guarantor($data['loan_details'][0]['guarantor2']))->result_array();
		$data['savings'] = $this->savings->member_savings($data['loan_details'][0]['user_id']);
		$name = $data['loan_details'][0]['middle_name']." ".$data['loan_details'][0]['first_name'];
		$data['section'] = "ADI Sacco";
	    $data['subtitle'] = "Manager";
	  	$data['page_title'] = "Loans Preview";
	  	$data['subpage_title'] = $name;
		$data['module'] = "manager";
		$data['view_file'] = "loan_preview";
		// echo "<pre>";print_r($data);die();
		echo Modules::run('template/member', $data);
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
			<p>Hello, </p>
			<p>This Email is to notify you that one, ".$data[0]['last_name']." ".$data[0]['first_name']." ".$data[0]['middle_name'].", has requested you to be a guarantor in a loan he/she has applied.</p>
			<p>Please Login to the system to accept or decline this request: <a href='".base_url() ."'>Click Here</a></p>
			<p>If you fail to respond within 48 hours the application will be declined.</p>
		</body>
		</html>";

		return $template;
	}

}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Loans extends MY_Controller 
{

	function __construct() {
		parent::__construct();
		
	}

	function create(){

		$data= $this->get_data_from_post();
		$this->load->model('m_loans');
		$data['maloantype']  = $this->m_loans->get_loan_type();
		$data['repayment_periods'] = $this->application_repayment_periods();
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
			# code...
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
		$data['guarantor1']=$this->input->post('guarantor1', TRUE);
		$data['guarantor2']=$this->input->post('guarantor2', TRUE);
		
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
	    if ($data['loan_type'] ==3) {$data['rates']=15;} else {$data['rates']=20;}
		$data['instalments']=($data['rates'] + $data['rates'] / ( (1+ $data['rates']) ^  $data['months'] -1)) * $data['loan_amount'] ;
		$data['loan_payable']= $data['instalments'] * $data['months'];
		$data['status']= "PENDING"; 
		$data['user_id']=$this->session->userdata('user_id');
		$data['is_paid']=0;
		$data['is_risky']=0;
	   	
	   	
	   // if(is_numeric($update_id)){
	   //   $this->_update($update_id, $data);
	   //   $this->session->set_flashdata('msg', '<div id="alert-message" class="alert alert-success text-center">County details updated successfully!</div>');
	     
	   // } else {
	     $this->_insert($data);
	     $id = mysql_insert_id();
	     $notification = array(
	     					'loan' => $id,
	   						'guarantor1'=> $this->input->post('guarantor1'),
							'guarantor2'=> $this->input->post('guarantor2'),
							'amount'=> $this->input->post('loan_amount')
	   						);
	     $this->load->module('notifications');
	     $notify = $this->notifications->send_notification($notification);
	     $this->session->set_flashdata('msg', '<div id="alert-message" class="alert alert-success text-center">Your loan request has been added successfully!</div>');
	   //}
	   
	                   //$this->session->set_flashdata('success', 'County added successfully.');
	   redirect('loans/view_loans/'.$this->session->userdata('user_id'));
	 }
	}

	function dataTable_loans($loans)
	{
		$loans_data = '';
		
		$count = 1;
		if ($loans) {
			foreach ($loans as $key => $value) {
				$loans_data .= '<tr>
									<td>'.$count.'</td>
									<td>'.$value['user_id'].'</td>
									<td>'.$value['loan_amount'].'</td>
									<td>'.$value['loan_purpose'].'</td>
									<td>'.$value['guarantor1'].'</td>
									<td>'.$value['guarantor2'].'</td>
									<td>'.$value['is_paid'].'</td>
									<td>'.$value['status'].'</td>
									<td><a href="'.base_url().'loans/loan_preview/'.$value['loan_id'].'"><button class="btn btn-primary">Preview Loan</button></a></td>
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

	function application_repayment_periods()
	{
		$repayments = array();
      	$periods = $this->m_loans->loan_repayment_months();
	  	foreach($periods as $row ){
	  		$repayments[$row->loan_repayment_period_id] = $row->months;
	  	}
	  	return $repayments;
	}

	function confirm_guarantor($id){
		$this->load->module('member');
		$memeber = $this->member->get_active_memeber($id)->result_array();
		echo json_encode($memeber);
	}

	function loan_preview($loan_id)
	{

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

}
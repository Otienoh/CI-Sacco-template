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
        $data['section'] = "ADI Sacco";
		$data['subtitle'] = "Loan Module";
		$data['page_title'] = "Loan";
		$data['subpage_title'] = "Application";
		$data['module'] = "loans";
		$data['view_file'] = "loan_application_view";
		//echo "<pre>";print_r($data);die;
		echo Modules::run('template/member', $data);
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
	$data['loan_payable']= $data['instalments'] * $months;
	$data['status']= "PENDING"; 
	$data['user_id']=1;
	$data['is_paid']=0;
	$data['is_risky']=0;
   
   // if(is_numeric($update_id)){
   //   $this->_update($update_id, $data);
   //   $this->session->set_flashdata('msg', '<div id="alert-message" class="alert alert-success text-center">County details updated successfully!</div>');
     
   // } else {
     $this->_insert($data);
     $this->session->set_flashdata('msg', '<div id="alert-message" class="alert alert-success text-center">Your loan request has been added successfully!</div>');
   //}
   
                   //$this->session->set_flashdata('success', 'County added successfully.');
   redirect('loans/create');
 }
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
		echo Modules::run('template/manager', $data);
	}

}
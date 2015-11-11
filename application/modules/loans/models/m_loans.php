<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class M_loans extends MY_Model {

function __construct() {
parent::__construct();
}

function get_table() {
    $table = "loans";
    return $table;
}

function get_laon_rate($id)
{
	$this->db->select('rates');
 	$this->db->from('loan_types');
 	$this->db->where('loan_type_id', $id);

 	$query = $this->db->get()->result_array();
 	return $query[0]['rates'];
}

function get_loan_type(){
$query=$this->db->get('loan_types');
return $query;
}

function confirm_guarantors_approval($loan_id)
{
	$sql = "SELECT `status`
			FROM
				`loan_notifications`
			WHERE `loan_id` = '$loan_id'";
	$result = $this->_custom_query($sql)->result_array();

	$flag = TRUE;
	foreach ($result as $key => $value) {
		if($value['status']==0)
		{
			$flag = FALSE;
		}
	}
	// echo $flag;die();
	return $flag;
}

function loan_repayment($loan_id)
{
	$id=$this->input->post('edit_id');
	$result = $this->db->query("SELECT `loan_balance` FROM `loans` WHERE `status` = '0' OR `is_paid` = '0' AND `user_id` = '$user_id'")->result_array();
	
	$loan_balance = $result[0]['loan_balance'];
	echo($loan_balance);die();
	$amount_payable=$this->input->post('amount_payable');
	$amount_deposit=$this->input->post('edit_amount');
	$loan_balance = ($loan_balance-$amount_deposit);

	if ($loan_balance==0) {
		$update = array(
					'loan_balance' => $loan_balance,
					'is_paid' => 1 );
	}else{
		$update = array(
					'loan_balance' => $loan_balance );
	}
	$this->_update($loan_id,$update);

	$data = array(
				'loan_id' => $loan_id,
				'payment_amount' => $amount_deposit
				);
	return $this->db->insert('loan_repayment', $data);
}

function check_previous_loans($user_id)
{
	$result = $this->db->query("SELECT * FROM `loans` WHERE `status` = '0' OR `is_paid` = '0' AND `user_id` = '$user_id'")->result_array();
	if ($result) {
		$block = TRUE;
	} else {
		$block = FALSE;
	}
	// echo $block;die();
	return $block;
}

function get($order_by){
$table = $this->get_table();
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}

function get_with_limit($limit, $offset, $order_by) {
$table = $this->get_table();
$this->db->limit($limit, $offset);
$this->db->order_by($order_by);
$query=$this->db->get($table);
return $query;
}

function get_where($id){
$table = $this->get_table();
$this->db->where('id', $id);
$query=$this->db->get($table);
return $query;
}

function get_where_custom($col, $value) {
$table = $this->get_table();
$this->db->where($col, $value);
$query=$this->db->get($table);
return $query;
}

function _insert($data){
$table = $this->get_table();
$this->db->insert($table, $data);
}

function _update($id, $data){
$table = $this->get_table();
$this->db->where('loan_id', $id);
$this->db->update($table, $data);
}

function _delete($id){
$table = $this->get_table();
$this->db->where('id', $id);
$this->db->delete($table);
}

function count_where($column, $value) {
$table = $this->get_table();
$this->db->where($column, $value);
$query=$this->db->get($table);
$num_rows = $query->num_rows();
return $num_rows;
}

function count_all() {
$table = $this->get_table();
$query=$this->db->get($table);
$num_rows = $query->num_rows();
return $num_rows;
}

function get_max() {
$table = $this->get_table();
$this->db->select_max('id');
$query = $this->db->get($table);
$row=$query->row();
$id=$row->id;
return $id;
}

function _custom_query($mysql_query) {
$query = $this->db->query($mysql_query);
return $query;
}

function get_loan_details($loan_id)
{
	$sql = "SELECT *
			FROM `loans` `ln`
			JOIN `loan_notifications` `lns` ON `ln`.`loan_id` = `lns`.`loan_id`
			JOIN `users` `us` ON `ln`.`user_id` = `us`.`user_id`
			JOIN `loan_types` `lt` ON `ln`.`loan_type` = `lt`.`loan_type_id`
			JOIN `members` `mb` ON `mb`.`user_id` = `ln`.`user_id`
			WHERE `ln`.`loan_id` = '$loan_id'";
	return $sql;
}

function loan_guarantor($member_id)
{
	$sql = "SELECT
				`mb`.`first_name`,
				`mb`.`middle_name`,
				`mb`.`last_name`,
				`mb`.`mobile_number`,
				SUM(`sv`.`deposit`)-SUM(`sv`.`withdrawal`) AS 'current_savings'
			FROM `members` `mb`
			JOIN `savings` `sv` ON `mb`.`user_id` = `sv`.`user_id`
			WHERE `mb`.`member_id` = '$member_id'
			JOIN `members` `mb` ON `mb`.`user_id` = `ln`.`user_id`";
	$query = $this->db->query($sql);
	return $query;
}

function guarantee_requests($user_id)
{
	$guarantor_details = $this->get_user_member_data($user_id)->result_array();
	$member_id = $guarantor_details[0]['member_id'];
	
	$sql = "SELECT *, YEAR(`l`.`date_of_application`) AS `year_of_application`, MONTH(`l`.`date_of_application`) AS `month_of_application`, DAY(`l`.`date_of_application`) AS `day_of_application`, TIME(`l`.`date_of_application`) AS `time_of_application` FROM `loan_notifications` `ln`
			JOIN `loans` `l` ON `ln`.`loan_id` = `l`.`loan_id`
			JOIN `members` `mb` ON `ln`.`applicant_id` = `mb`.`member_id`
			WHERE `ln`.`guarantor_id` = '$member_id' AND `ln`.`status`='0'";

	return $this->_custom_query($sql);
}

function guarantor_response($response,$loan_id,$guarantor_id)
{
	$sql = "UPDATE 
				`loan_notifications`
			SET 
				`status`='$response'
			WHERE
				`loan_id`='$loan_id' AND `guarantor_id` = '$guarantor_id'";
			
	return $sql;
}

}
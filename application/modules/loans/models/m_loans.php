<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class M_loans extends MY_Model {

function __construct() {
parent::__construct();
}

function get_table() {
    $table = "loans";
    return $table;
}

function get_loan_type(){
$query=$this->db->get('loan_types');
return $query->result();
}

function loan_repayment_months()
{
	$this->db->where('status',1);
	$query=$this->db->get('loan_repayment_periods');
	return $query->result();
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
$this->db->where('id', $id);
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
			JOIN `users` `us` ON `ln`.`user_id` = `us`.`user_id`
			JOIN `loan_types` `lt` ON `ln`.`loan_type` = `lt`.`loan_type_id`
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
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class M_manager extends MY_Model {

function __construct() {
parent::__construct();
}


function get_loan_details($loan_id)
{
	$sql = "SELECT 
				`ln`.`loan_id`,
				`ln`.`loan_amount`,
				`ln`.`loan_purpose`,
				DAY(`ln`.`date_of_application`) AS `date_of_application`,
				MONTH(`ln`.`date_of_application`) AS `month_of_application`,
				YEAR(`ln`.`date_of_application`) AS `year_of_application`,
				`ln`.`months`,
				`ln`.`instalments`,
				`ln`.`month_income`,
				`ln`.`status`,
				`lt`.`name` AS `loan_type`,
				`mb`.`member_id`,
				`mb`.`first_name`,
				`mb`.`middle_name`,
				`mb`.`last_name`,
				`mb`.`mobile_number`,
				`mb`.`town`
			FROM `loans` `ln`
			JOIN `users` `us` ON `ln`.`user_id` = `us`.`user_id`
			JOIN `loan_types` `lt` ON `ln`.`loan_type` = `lt`.`loan_type_id`
			JOIN `members` `mb` ON `mb`.`user_id` = `ln`.`user_id`
			WHERE `ln`.`loan_id` = '$loan_id'";
	return $sql;
}

function get_guarantor_affirmation($loan_id)
{
	$sql = "SELECT
				`ln`.`status`,
				`mb`.`first_name`,
				`mb`.`middle_name`,
				`mb`.`last_name`,
				`mb`.`mobile_number`,
				`mb`.`user_id`
			FROM `loan_notifications` `ln`
			JOIN `members` `mb` ON `ln`.`guarantor_id` = `mb`.`member_id`
			WHERE `ln`.`loan_id` = '$loan_id'";
	return $sql;
}

function get_loan_notifications($loan_id)
{
	$this->db->where('loan_id',$loan_id);
	return $this->db->get('loan_notifications');
}

function prepare_loan_clearance_stmt($loan_id,$status)
{
	$sql = "UPDATE 
				`loans`
			SET
				`status` = '$status'
			WHERE `loan_id` = '$loan_id'";
	return $sql;
}

}
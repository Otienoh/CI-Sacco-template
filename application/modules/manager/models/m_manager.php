<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class M_manager extends MY_Model {

function __construct() {
parent::__construct();
}


function get_loan_details($loan_id)
{
	$sql = "SELECT *
			FROM `loans` `ln`
			JOIN `users` `us` ON `ln`.`user_id` = `us`.`user_id`
			JOIN `loan_types` `lt` ON `ln`.`loan_type` = `lt`.`loan_type_id`
			JOIN `members` `mb` ON `mb`.`user_id` = `ln`.`user_id`
			WHERE `ln`.`loan_id` = '$loan_id'";
	return $sql;
}

}
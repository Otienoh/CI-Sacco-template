<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class M_manager extends MY_Model {

function __construct() {
parent::__construct();
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
<?php
/**
* 
*/
class m_reports extends MY_Model
{
	
	function __construct()
	{
		parent:: __construct();
	}
	function loan_monthly_amounts($year,$user_id)
	{
		$addition = isset($user_id)? "AND `ln`.`user_id` = '$user_id'": NULL;
		$sql = "SELECT
					SUM(`ln`.`loan_amount`) AS `amount`,
					MONTH(`ln`.`date_of_application`) AS `month`
				FROM `loans` `ln`
				WHERE YEAR(`ln`.`date_of_application`) = '$year'
				AND `ln`.`status` = '1'
				$addition
				GROUP BY `ln`.`date_of_application`";

		$result = $this->db->query($sql)->result_array();
		// echo "<pre>";print_r($result);die();
		$months = array(1,2,3,4,5,6,7,8,9,10,11,12);

		$data[0]["name"]	=  "Loan Amount";

		// $count1=0;
		foreach ($months as $key => $value) {	

			$data[0]["data"][$key]	=  0;
			
			foreach ($result as $key1 => $value1) {
				
				if( (int)$value == (int) $value1["month"]){
					$data[0]["data"][$key]	=  (int) $value1["amount"];
				}
			}
		}
		// echo "<pre>";print_r($data);
		// die();
		return $data;
	}

	function savings_monthly_amounts($year,$user_id)
	{
		$sql = "SELECT
					SUM(`deposit`) AS `deposits`,
					SUM(`withdrawal`) AS `withdrawals`,
					MONTH(`transaction_date`) AS `month`
				FROM `savings`
				WHERE YEAR(`transaction_date`) = '$year' AND `user_id` = '$user_id'
				GROUP BY `month`";

		$result = $this->db->query($sql)->result_array();
		// echo "<pre>";print_r($result);die();
		$months = array(1,2,3,4,5,6,7,8,9,10,11,12);

		$data[0]["name"]	=  "Savings";
		$data[1]["name"]	=  "Withdrawals";

		// $count1=0;
		foreach ($months as $key => $value) {	

			$data[0]["data"][$key]	=  0;
			$data[1]["data"][$key]	=  0;
			
			foreach ($result as $key1 => $value1) {
				
				if( (int)$value == (int) $value1["month"]){
					$data[0]["data"][$key]	=  (int) $value1["deposits"];
					$data[1]["data"][$key]	=  -(int) $value1["withdrawals"];
				}
			}
		}
		// echo "<pre>";print_r($data);
		// die();
		return $data;
	}

	function popular_loan_types()
	{
		$sql = "SELECT
					`lt`.`name`,
					COUNT(`ln`.`loan_id`) AS `loans`
				FROM `loans` `ln`
				JOIN `loan_types` `lt` ON `ln`.`loan_type` = `lt`.`loan_type_id`
				WHERE `ln`.`status` = 1
				GROUP BY `name`";

		$result = $this->db->query($sql)->result_array();
		$count=0;

		foreach ($result as $key => $value) {
			$data[$count] = $value['name'];
			$data[$count+1] = (int) $value['loans'];
			$newArray[] = $data;
		}
		return $newArray;
	}

}
?>
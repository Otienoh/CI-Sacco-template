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
	function loan_monthly_amounts($year)
	{
		$sql = "SELECT
					SUM(`ln`.`loan_amount`) AS `amount`,
					MONTH(`ln`.`date_of_application`) AS `month`
				FROM `loans` `ln`
				WHERE YEAR(`ln`.`date_of_application`) = '$year' AND `ln`.`status` = '1'
				GROUP BY `ln`.`date_of_application`";

		$result = $this->db->query($sql)->result_array();
		// echo "<pre>";print_r($result);die();
		$months = array(1,2,3,4,5,6,7,8,9,10,11,12);

		$data["chart"][0]["name"]	=  "Loan Amount";

		// $count1=0;
		foreach ($months as $key => $value) {	

			$data["chart"][0]["data"][$key]	=  0;
			
			foreach ($result as $key1 => $value1) {
				
				if( (int)$value == (int) $value1["month"]){
					$data["chart"][0]["data"][$key]	=  (int) $value1["amount"];
				}
			}
		}
		// echo "<pre>";print_r($data);
		// die();
		return $data;
	}

}
?>
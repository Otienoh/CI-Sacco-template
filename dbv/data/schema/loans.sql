CREATE TABLE `loans` (
  `loan_id` int(14) NOT NULL AUTO_INCREMENT,
  `user_id` int(14) NOT NULL,
  `loan_amount` decimal(16,2) NOT NULL,
  `loan_purpose` text NOT NULL,
  `loan_type` int(12) NOT NULL,
  `date_of_application` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `months` int(12) NOT NULL,
  `rates` float NOT NULL,
  `instalments` decimal(32,5) NOT NULL,
  `guarantor1` int(14) NOT NULL,
  `guarantor2` int(14) NOT NULL,
  `loan_payable` decimal(24,2) NOT NULL,
  `month_income` decimal(24,2) NOT NULL,
  `status` varchar(32) NOT NULL,
  `is_paid` int(2) NOT NULL,
  `is_risky` int(2) NOT NULL,
  PRIMARY KEY (`loan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
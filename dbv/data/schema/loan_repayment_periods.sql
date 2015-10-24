CREATE TABLE `loan_repayment_periods` (
  `loan_repayment_period_id` int(11) NOT NULL AUTO_INCREMENT,
  `months` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`loan_repayment_period_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
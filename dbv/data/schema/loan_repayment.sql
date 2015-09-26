CREATE TABLE `loan_repayment` (
  `repayment_id` int(14) NOT NULL AUTO_INCREMENT,
  `loan_id` int(14) NOT NULL,
  `payment_amount` decimal(24,2) NOT NULL,
  `is_deleted` int(2) NOT NULL,
  PRIMARY KEY (`repayment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
ALTER TABLE  `loan_repayment` CHANGE  `is_deleted`  `is_confirmed` INT( 2 ) NOT NULL DEFAULT  '0';
Drop table `loan_repayment_periods`;
TRUNCATE `loans`;
TRUNCATE `loan_notifications`;
TRUNCATE `loan_repayment`;
TRUNCATE `loan_types`;
ALTER TABLE  `loan_repayment` ADD  `repayment_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;
ALTER TABLE  `loans` ADD  `loan_balance` FLOAT( 24, 2 ) NOT NULL AFTER  `loan_payable` ;
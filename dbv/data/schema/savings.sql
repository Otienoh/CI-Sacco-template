CREATE TABLE `savings` (
  `savings_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `client` varchar(500) NOT NULL,
  `deposit` decimal(24,2) DEFAULT NULL,
  `withdrawal` decimal(24,2) DEFAULT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`savings_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
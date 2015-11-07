CREATE TABLE `standing_order` (
  `standing_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `amount` decimal(24,2) NOT NULL,
  PRIMARY KEY (`standing_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
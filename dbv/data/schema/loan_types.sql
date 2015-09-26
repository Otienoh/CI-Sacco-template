CREATE TABLE `loan_types` (
  `loan_type_id` int(14) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `description` text NOT NULL,
  `rates` float NOT NULL,
  `added_by` int(14) NOT NULL,
  PRIMARY KEY (`loan_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
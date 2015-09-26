CREATE TABLE `members` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `ID_No` varchar(50) NOT NULL,
  `town` varchar(100) NOT NULL,
  `residence` varchar(100) NOT NULL,
  `occuppation` varchar(50) NOT NULL,
  `county` varchar(50) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `joining_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `passport_images` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
CREATE TABLE `loan_notifications` (
  `loan_notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `loan_id` int(11) NOT NULL,
  `applicant_id` int(11) NOT NULL,
  `guarantor_id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `is_viewed` int(11) NOT NULL DEFAULT '1',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`loan_notification_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1
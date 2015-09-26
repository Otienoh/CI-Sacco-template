ALTER TABLE  `admin` ADD  `gender` VARCHAR( 6 ) NOT NULL AFTER  `last_name` ;
ALTER TABLE  `managers` ADD  `mobile_number` VARCHAR( 15 ) NOT NULL AFTER  `gender` ;
ALTER TABLE  `users` CHANGE  `activation_key`  `activation_key` VARCHAR( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL ;
ALTER TABLE  `members` ADD  `gender` VARCHAR( 6 ) NOT NULL AFTER  `last_name` ;
ALTER TABLE  `managers` ADD  `gender` VARCHAR( 6 ) NOT NULL AFTER  `ID_No` ;
ALTER TABLE  `members` CHANGE  `residence`  `residence` VARCHAR( 100 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL ,
CHANGE  `occuppation`  `occuppation` VARCHAR( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL ,
CHANGE  `county`  `county` VARCHAR( 50 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL ,
CHANGE  `mobile_number`  `mobile_number` VARCHAR( 15 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL ,
CHANGE  `passport_images`  `passport_images` VARCHAR( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL ;

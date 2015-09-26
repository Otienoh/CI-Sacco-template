ALTER TABLE  `members` ADD  `complete` INT NOT NULL DEFAULT  '1';
ALTER TABLE  `managers` ADD  `passport_images` VARCHAR( 255 ) NOT NULL AFTER  `title` ;
ALTER TABLE  `managers` CHANGE  `passport_images`  `passport_images` VARCHAR( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL ;

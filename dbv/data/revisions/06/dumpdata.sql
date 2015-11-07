ALTER TABLE  `savings` ADD  `description` TEXT NOT NULL ;
INSERT INTO `savings_methods` (`id`, `source`, `status`, `parent_id`) VALUES
(1, 'Mobile Money', 1, 0),
(2, 'Bank', 1, 0),
(3, 'M-Pesa', 1, 1),
(4, 'Airtel Money', 1, 1);
INSERT INTO `saccodb`.`savings_methods` (`id`, `source`, `status`, `parent_id`) VALUES (NULL, 'Orange Money', '1', '1');
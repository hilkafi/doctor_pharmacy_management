----02-12-19--by kafi----
ALTER TABLE `personal_info` ADD `b_date` VARCHAR(100) NULL DEFAULT NULL AFTER `marriage_anniversary`, ADD `m_date` VARCHAR(100) NULL DEFAULT NULL AFTER `b_date`;

----13-12-19--kafi--
ALTER TABLE `doctor` ADD `is_verified` INT NOT NULL DEFAULT '0' AFTER `is_covered`;
ALTER TABLE `dispensary` ADD `is_verified` INT NOT NULL DEFAULT '0' AFTER `is_covered`;
ALTER TABLE `hospital` ADD `is_verified` INT NOT NULL DEFAULT '0' AFTER `img_loc`;
ALTER TABLE `dispensary` ADD `created_by` INT NULL DEFAULT NULL AFTER `img_loc`;
ALTER TABLE `doctor` ADD `created_by` INT NULL DEFAULT NULL AFTER `is_deleted`; 
---20-12-19---
ALTER TABLE `users` ADD `contact` VARCHAR(256) NULL DEFAULT NULL AFTER `user_role`; 
ALTER TABLE `employee` CHANGE `phone` `phone` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL; 
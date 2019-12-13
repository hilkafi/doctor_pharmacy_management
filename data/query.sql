----02-12-19--by kafi----
ALTER TABLE `personal_info` ADD `b_date` VARCHAR(100) NULL DEFAULT NULL AFTER `marriage_anniversary`, ADD `m_date` VARCHAR(100) NULL DEFAULT NULL AFTER `b_date`;

----13-12-19--kafi--
ALTER TABLE `doctor` ADD `is_verified` INT NOT NULL DEFAULT '0' AFTER `is_covered`;
ALTER TABLE `dispensary` ADD `is_verified` INT NOT NULL DEFAULT '0' AFTER `is_covered`;
ALTER TABLE `hospital` ADD `is_verified` INT NOT NULL DEFAULT '0' AFTER `img_loc`; 
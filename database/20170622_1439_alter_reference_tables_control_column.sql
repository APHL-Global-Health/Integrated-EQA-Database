ALTER TABLE `reference_result_dbs` 
CHANGE COLUMN `control` `control` INT(11) NULL DEFAULT 0 ;

ALTER TABLE `reference_result_dts` 
CHANGE COLUMN `control` `control` INT(11) NULL DEFAULT 0 ;

ALTER TABLE `reference_result_eid` 
CHANGE COLUMN `reference_result` `reference_result` VARCHAR(255) NULL DEFAULT NULL ,
CHANGE COLUMN `control` `control` INT(11) NULL DEFAULT 0 ;

ALTER TABLE `reference_result_tb` 
CHANGE COLUMN `control` `control` INT(11) NULL DEFAULT 0 ;

ALTER TABLE `reference_result_vl` 
CHANGE COLUMN `control` `control` INT(11) NULL DEFAULT 0 ;



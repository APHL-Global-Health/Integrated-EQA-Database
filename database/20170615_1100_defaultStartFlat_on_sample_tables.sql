ALTER TABLE `eanalyze_test`.`tbl_bac_shipments` 
CHANGE COLUMN `startRoundFlag` `startRoundFlag` VARCHAR(10) NULL DEFAULT '1' ;

ALTER TABLE `eanalyze_test`.`tbl_bac_rounds` 
CHANGE COLUMN `startRoundFlag` `startRoundFlag` VARCHAR(10) NULL DEFAULT '1' ;

ALTER TABLE `eanalyze_test`.`tbl_bac_panels_shipments` 
CHANGE COLUMN `startRoundFlag` `startRoundFlag` VARCHAR(10) NULL DEFAULT '1' ;


ALTER TABLE `eanalyze_test`.`tbl_bac_sample_to_panel` 
CHANGE COLUMN `startRoundFlag` `startRoundFlag` VARCHAR(10) NULL DEFAULT '1' ;





ALTER TABLE `eanalyze_test`.`tbl_bac_response_results` 
CHANGE COLUMN `grainStainReactionScore` `grainStainReactionScore` INT(11) NULL DEFAULT NULL ,
CHANGE COLUMN `finalScore` `finalScore` INT(11) NULL DEFAULT NULL ;


ALTER TABLE `eanalyze_test`.`tbl_bac_rounds` 
ADD COLUMN `publishedDate` DATETIME NULL AFTER `published`;


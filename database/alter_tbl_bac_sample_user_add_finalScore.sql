ALTER TABLE `eanalyze`.`tbl_bac_samples_to_users` 
ADD COLUMN `finalScore` DECIMAL(4,2) NULL DEFAULT NULL AFTER `adminMarked`;

ALTER TABLE `eanalyze`.`tbl_bac_response_results` 
CHANGE COLUMN `grainStainReactionScore` `grainStainReactionScore` DECIMAL(4,2) NULL DEFAULT NULL ,
CHANGE COLUMN `finalIdentificationScore` `finalIdentificationScore` DECIMAL(4,2) NULL DEFAULT NULL ;


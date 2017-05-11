ALTER TABLE `tbl_bac_response_results` 
CHANGE COLUMN `grainStainReactionScore` `grainStainReactionScore` INT(11) NULL DEFAULT 0 ,
CHANGE COLUMN `finalIdentificationScore` `finalIdentificationScore` INT(11) NULL DEFAULT 0 ,
CHANGE COLUMN `finalScore` `finalScore` INT(11) NULL DEFAULT 0 ,
CHANGE COLUMN `totalMicroAgentsScore` `totalMicroAgentsScore` INT(11) NULL DEFAULT 0 ;



ALTER TABLE `tbl_bac_response_results` 
DROP COLUMN `totalMicroAgentsScore`;
ALTER TABLE `tbl_bac_response_results` 
ADD COLUMN `totalMicroAgentsScore` INT NULL DEFAULT NULL AFTER `adminMarked`;


ALTER TABLE `tbl_bac_micro_bacterial_agents` 
CHANGE COLUMN `score` `score` INT(11) NULL DEFAULT 0 ;

ALTER TABLE `tbl_bac_samples_to_users` ADD COLUMN `finalScore` int NULL DEFAULT NULL AFTER `adminMarked`;

ALTER TABLE `tbl_bac_response_results` CHANGE COLUMN `grainStainReactionScore` `grainStainReactionScore` int NULL DEFAULT NULL ,
 CHANGE COLUMN `finalIdentificationScore` `finalIdentificationScore` int NULL DEFAULT NULL ;

ALTER TABLE `participant` ADD COLUMN `IsVl` VARCHAR(45) NULL DEFAULT 0 AFTER `status`;




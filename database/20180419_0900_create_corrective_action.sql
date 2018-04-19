CREATE TABLE `eanalyze_test`.`rep_corrective_action` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `ProviderID` INT NULL,
  `ProgramID` INT NULL,
  `RoundID` INT NULL,
  `action` TEXT NULL,
  `dateCreated` DATETIME NULL DEFAULT now(),
  `participant_id` INT NULL,
  PRIMARY KEY (`ID`));

  ALTER TABLE `eanalyze_test`.`rep_corrective_action` 
ADD COLUMN `createdBy` INT NULL AFTER `participant_id`;

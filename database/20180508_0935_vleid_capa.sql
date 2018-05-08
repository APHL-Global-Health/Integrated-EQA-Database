CREATE TABLE `vl_eid_capa` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `participantId` INT NULL,
  `dmId` INT NULL,
  `dateCreated` INT NULL,
  `descriptionOccurence` TEXT NULL,
  `preanalytical` TEXT NULL,
  `analytical` TEXT NULL,
  `postanalytical` TEXT NULL,
  `rootCause` TEXT NULL,
  `measuresTaken` TEXT NULL,
  `actionEffective` TEXT NULL,
  `preventRecurrence` TEXT NULL,
  `surveyId` INT NULL,
  PRIMARY KEY (`id`));

  
  ALTER TABLE `vl_eid_capa` 
ADD COLUMN `attributingFactors` TEXT NULL AFTER `surveyId`;

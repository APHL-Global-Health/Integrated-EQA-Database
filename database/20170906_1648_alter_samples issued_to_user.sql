ALTER TABLE `eanalyze_test`.`tbl_bac_samples_to_users` 
ADD UNIQUE INDEX `sampleUser` (`userId` ASC, `sampleId` ASC, `roundId` ASC, `participantId` ASC);

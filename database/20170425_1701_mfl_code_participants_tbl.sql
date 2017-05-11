ALTER TABLE `participant` 
ADD COLUMN `MflCode` VARCHAR(45) NULL DEFAULT NULL AFTER `ModuleID`;

drop trigger if exists updatePanelAndSamples


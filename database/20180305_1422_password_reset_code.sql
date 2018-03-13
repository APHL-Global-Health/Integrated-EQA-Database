ALTER TABLE `data_manager` 
ADD COLUMN `resetCode` VARCHAR(105) NULL DEFAULT 'null' AFTER `IsTester`;

ALTER TABLE `shipment` 
ADD COLUMN `testingInstructions` TEXT NULL AFTER `status`;

alter table response_result_dbs add mandatory varchar(100) null
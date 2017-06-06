CREATE TABLE `vl_peer_mean` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `peerName` varchar(45) DEFAULT NULL,
  `dateCreated` datetime DEFAULT CURRENT_TIMESTAMP,
  `result` varchar(45) DEFAULT NULL,
  `roundId` int(11) DEFAULT NULL,
  `shipmentId` int(11) DEFAULT NULL,
  `mean` decimal(10,0) DEFAULT NULL,
  `SDI` decimal(10,0) DEFAULT NULL,
  `system_id` int(11) DEFAULT NULL,
  `participant_id` int(11) DEFAULT NULL,
  `sampleId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shipmentId_UNIQUE` (`shipmentId`,`sampleId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;


ALTER TABLE `eanalyze_test`.`vl_peer_mean` 
DROP INDEX `shipmentId_UNIQUE` ,
ADD UNIQUE INDEX `shipmentId_UNIQUE` (`shipmentId` ASC, `sampleId` ASC, `system_id` ASC);
